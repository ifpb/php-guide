#!/bin/bash
ip=$1
cnt=$2
resping=`ping -c$cnt $ip`
temp=`echo -e "$resping \n" | grep icmp_seq | sed -E "s/(.+) bytes from (.+): icmp_seq=(.+) ttl=(.+) time=(.+) ms/\1 \2 \3 \4 \5/"`
n_linhas=`echo -e "$temp \n" | wc -l`
res="[\n"
for (( i=1; i < $n_linhas; i++ ))
do
	for (( j=1; j <= 5; j++ ))
	do
		rem=`echo -e "$temp \n" | sed "$i! d" | cut -f$j -d" "`
		case $j in
			1)
				bytes="\"bytes\":$rem,"
			;;
			2)
				ip="\"ip\":$rem,"
			;;
			3)
				icmp_seq="\"icmp_seq\":$rem,"
			;;
			4)
				ttl="\"ttl\":$rem,"
			;;
			5)
				timen="\"time\":$rem"
			;;
		esac
	done
	if (( $i == $n_linhas-1 ))
	then
		res="$res\t{\n\t\t$bytes\n\t\t$ip\n\t\t$icmp_seq\n\t\t$ttl\n\t\t$timen\n\t}\n"
	else
		res="$res\t{\n\t\t$bytes\n\t\t$ip\n\t\t$icmp_seq\n\t\t$ttl\n\t\t$timen\n\t},\n"
	fi
done
res="$res]"
echo -e $res
