# Debian Packages

<!--
$ docker run -it --rm debian:buster-slim bash
root@91b1a89a5de2:/# dpkg -l
Desired=Unknown/Install/Remove/Purge/Hold
| Status=Not/Inst/Conf-files/Unpacked/halF-conf/Half-inst/trig-aWait/Trig-pend
|/ Err?=(none)/Reinst-required (Status,Err: uppercase=bad)
||/ Name                    Version                Architecture Description
+++-=======================-======================-============-========================================================================
ii  adduser                 3.118                  all          add and remove users and groups
ii  apt                     1.8.2                  amd64        commandline package manager
ii  base-files              10.3+deb10u2           amd64        Debian base system miscellaneous files
ii  base-passwd             3.5.46                 amd64        Debian base system master password and group files
ii  bash                    5.0-4                  amd64        GNU Bourne Again SHell
ii  bsdutils                1:2.33.1-0.1           amd64        basic utilities from 4.4BSD-Lite
ii  coreutils               8.30-3                 amd64        GNU core utilities
ii  dash                    0.5.10.2-5             amd64        POSIX-compliant shell
ii  debconf                 1.5.71                 all          Debian configuration management system
ii  debian-archive-keyring  2019.1                 all          GnuPG archive keys of the Debian archive
ii  debianutils             4.8.6.1                amd64        Miscellaneous utilities specific to Debian
ii  diffutils               1:3.7-3                amd64        File comparison utilities
ii  dpkg                    1.19.7                 amd64        Debian package management system
ii  e2fsprogs               1.44.5-1+deb10u2       amd64        ext2/ext3/ext4 file system utilities
ii  fdisk                   2.33.1-0.1             amd64        collection of partitioning utilities
ii  findutils               4.6.0+git+20190209-2   amd64        utilities for finding files--find, xargs
ii  gcc-8-base:amd64        8.3.0-6                amd64        GCC, the GNU Compiler Collection (base package)
ii  gpgv                    2.2.12-1+deb10u1       amd64        GNU privacy guard - signature verification tool
ii  grep                    3.3-1                  amd64        GNU grep, egrep and fgrep
ii  gzip                    1.9-3                  amd64        GNU compression utilities
ii  hostname                3.21                   amd64        utility to set/show the host name or domain name
ii  init-system-helpers     1.56+nmu1              all          helper tools for all init systems
ii  libacl1:amd64           2.2.53-4               amd64        access control list - shared library
ii  libapt-pkg5.0:amd64     1.8.2                  amd64        package management runtime library
ii  libattr1:amd64          1:2.4.48-4             amd64        extended attribute handling - shared library
ii  libaudit-common         1:2.8.4-3              all          Dynamic library for security auditing - common files
ii  libaudit1:amd64         1:2.8.4-3              amd64        Dynamic library for security auditing
ii  libblkid1:amd64         2.33.1-0.1             amd64        block device ID library
ii  libbz2-1.0:amd64        1.0.6-9.2~deb10u1      amd64        high-quality block-sorting file compressor library - runtime
ii  libc-bin                2.28-10                amd64        GNU C Library: Binaries
ii  libc6:amd64             2.28-10                amd64        GNU C Library: Shared libraries
ii  libcap-ng0:amd64        0.7.9-2                amd64        An alternate POSIX capabilities library
ii  libcom-err2:amd64       1.44.5-1+deb10u2       amd64        common error description library
ii  libdb5.3:amd64          5.3.28+dfsg1-0.5       amd64        Berkeley v5.3 Database Libraries [runtime]
ii  libdebconfclient0:amd64 0.249                  amd64        Debian Configuration Management System (C-implementation library)
ii  libext2fs2:amd64        1.44.5-1+deb10u2       amd64        ext2/ext3/ext4 file system libraries
ii  libfdisk1:amd64         2.33.1-0.1             amd64        fdisk partitioning library
ii  libffi6:amd64           3.2.1-9                amd64        Foreign Function Interface library runtime
ii  libgcc1:amd64           1:8.3.0-6              amd64        GCC support library
ii  libgcrypt20:amd64       1.8.4-5                amd64        LGPL Crypto library - runtime library
ii  libgmp10:amd64          2:6.1.2+dfsg-4         amd64        Multiprecision arithmetic library
ii  libgnutls30:amd64       3.6.7-4                amd64        GNU TLS library - main runtime library
ii  libgpg-error0:amd64     1.35-1                 amd64        GnuPG development runtime library
ii  libhogweed4:amd64       3.4.1-1                amd64        low level cryptographic library (public-key cryptos)
ii  libidn2-0:amd64         2.0.5-1                amd64        Internationalized domain names (IDNA2008/TR46) library
ii  liblz4-1:amd64          1.8.3-1                amd64        Fast LZ compression algorithm library - runtime
ii  liblzma5:amd64          5.2.4-1                amd64        XZ-format compression library
ii  libmount1:amd64         2.33.1-0.1             amd64        device mounting library
ii  libncursesw6:amd64      6.1+20181013-2+deb10u2 amd64        shared libraries for terminal handling (wide character support)
ii  libnettle6:amd64        3.4.1-1                amd64        low level cryptographic library (symmetric and one-way cryptos)
ii  libp11-kit0:amd64       0.23.15-2              amd64        library for loading and coordinating access to PKCS#11 modules - runtime
ii  libpam-modules:amd64    1.3.1-5                amd64        Pluggable Authentication Modules for PAM
ii  libpam-modules-bin      1.3.1-5                amd64        Pluggable Authentication Modules for PAM - helper binaries
ii  libpam-runtime          1.3.1-5                all          Runtime support for the PAM library
ii  libpam0g:amd64          1.3.1-5                amd64        Pluggable Authentication Modules library
ii  libpcre3:amd64          2:8.39-12              amd64        Old Perl 5 Compatible Regular Expression Library - runtime files
ii  libseccomp2:amd64       2.3.3-4                amd64        high level interface to Linux seccomp filter
ii  libselinux1:amd64       2.8-1+b1               amd64        SELinux runtime shared libraries
ii  libsemanage-common      2.8-2                  all          Common files for SELinux policy management libraries
ii  libsemanage1:amd64      2.8-2                  amd64        SELinux policy management library
ii  libsepol1:amd64         2.8-1                  amd64        SELinux library for manipulating binary security policies
ii  libsmartcols1:amd64     2.33.1-0.1             amd64        smart column output alignment library
ii  libss2:amd64            1.44.5-1+deb10u2       amd64        command-line interface parsing library
ii  libstdc++6:amd64        8.3.0-6                amd64        GNU Standard C++ Library v3
ii  libsystemd0:amd64       241-7~deb10u2          amd64        systemd utility library
ii  libtasn1-6:amd64        4.13-3                 amd64        Manage ASN.1 structures (runtime)
ii  libtinfo6:amd64         6.1+20181013-2+deb10u2 amd64        shared low-level terminfo library for terminal handling
ii  libudev1:amd64          241-7~deb10u2          amd64        libudev shared library
ii  libunistring2:amd64     0.9.10-1               amd64        Unicode string library for C
ii  libuuid1:amd64          2.33.1-0.1             amd64        Universally Unique ID library
ii  libzstd1:amd64          1.3.8+dfsg-3           amd64        fast lossless compression algorithm
ii  login                   1:4.5-1.1              amd64        system login tools
ii  mawk                    1.3.3-17+b3            amd64        a pattern scanning and text processing language
ii  mount                   2.33.1-0.1             amd64        tools for mounting and manipulating filesystems
ii  ncurses-base            6.1+20181013-2+deb10u2 all          basic terminal type definitions
ii  ncurses-bin             6.1+20181013-2+deb10u2 amd64        terminal-related programs and man pages
ii  passwd                  1:4.5-1.1              amd64        change and administer password and group data
ii  perl-base               5.28.1-6               amd64        minimal Perl system
ii  sed                     4.7-1                  amd64        GNU stream editor for filtering/transforming text
ii  sysvinit-utils          2.93-8                 amd64        System-V-like utilities
ii  tar                     1.30+dfsg-6            amd64        GNU version of the tar archiving utility
ii  tzdata                  2019c-0+deb10u1        all          time zone and daylight-saving time data
ii  util-linux              2.33.1-0.1             amd64        miscellaneous system utilities
ii  zlib1g:amd64            1:1.2.11.dfsg-1        amd64        compression library - runtime

$ ls -d -1 /bin/* /sbin/* /usr/bin/* /usr/sbin/* | xargs dpkg --search | sort
dpkg-query: no path found matching pattern /usr/bin/awk
dpkg-query: no path found matching pattern /usr/bin/nawk
dpkg-query: no path found matching pattern /usr/bin/pager
dpkg-query: no path found matching pattern /usr/bin/touch
dpkg-query: no path found matching pattern /usr/bin/which
dpkg-query: no path found matching pattern /usr/sbin/policy-rc.d
dpkg-query: no path found matching pattern /usr/sbin/rmt
adduser: /usr/sbin/addgroup
adduser: /usr/sbin/adduser
adduser: /usr/sbin/delgroup
adduser: /usr/sbin/deluser
apt: /usr/bin/apt
apt: /usr/bin/apt-cache
apt: /usr/bin/apt-cdrom
apt: /usr/bin/apt-config
apt: /usr/bin/apt-get
apt: /usr/bin/apt-key
apt: /usr/bin/apt-mark
base-passwd: /usr/sbin/update-passwd
bash: /bin/bash
bash: /bin/rbash
bash: /usr/bin/bashbug
bash: /usr/bin/clear_console
bsdutils: /usr/bin/logger
bsdutils: /usr/bin/renice
bsdutils: /usr/bin/script
bsdutils: /usr/bin/scriptreplay
bsdutils: /usr/bin/wall
coreutils: /bin/cat
coreutils: /bin/chgrp
coreutils: /bin/chmod
coreutils: /bin/chown
coreutils: /bin/cp
coreutils: /bin/date
coreutils: /bin/dd
coreutils: /bin/df
coreutils: /bin/dir
coreutils: /bin/echo
coreutils: /bin/false
coreutils: /bin/ln
coreutils: /bin/ls
coreutils: /bin/mkdir
coreutils: /bin/mknod
coreutils: /bin/mktemp
coreutils: /bin/mv
coreutils: /bin/pwd
coreutils: /bin/readlink
coreutils: /bin/rm
coreutils: /bin/rmdir
coreutils: /bin/sleep
coreutils: /bin/stty
coreutils: /bin/sync
coreutils: /bin/touch
coreutils: /bin/true
coreutils: /bin/uname
coreutils: /bin/vdir
coreutils: /usr/bin/[
coreutils: /usr/bin/arch
coreutils: /usr/bin/b2sum
coreutils: /usr/bin/base32
coreutils: /usr/bin/base64
coreutils: /usr/bin/basename
coreutils: /usr/bin/chcon
coreutils: /usr/bin/cksum
coreutils: /usr/bin/comm
coreutils: /usr/bin/csplit
coreutils: /usr/bin/cut
coreutils: /usr/bin/dircolors
coreutils: /usr/bin/dirname
coreutils: /usr/bin/du
coreutils: /usr/bin/env
coreutils: /usr/bin/expand
coreutils: /usr/bin/expr
coreutils: /usr/bin/factor
coreutils: /usr/bin/fmt
coreutils: /usr/bin/fold
coreutils: /usr/bin/groups
coreutils: /usr/bin/head
coreutils: /usr/bin/hostid
coreutils: /usr/bin/id
coreutils: /usr/bin/install
coreutils: /usr/bin/join
coreutils: /usr/bin/link
coreutils: /usr/bin/logname
coreutils: /usr/bin/md5sum
coreutils: /usr/bin/md5sum.textutils
coreutils: /usr/bin/mkfifo
coreutils: /usr/bin/nice
coreutils: /usr/bin/nl
coreutils: /usr/bin/nohup
coreutils: /usr/bin/nproc
coreutils: /usr/bin/numfmt
coreutils: /usr/bin/od
coreutils: /usr/bin/paste
coreutils: /usr/bin/pathchk
coreutils: /usr/bin/pinky
coreutils: /usr/bin/pr
coreutils: /usr/bin/printenv
coreutils: /usr/bin/printf
coreutils: /usr/bin/ptx
coreutils: /usr/bin/realpath
coreutils: /usr/bin/runcon
coreutils: /usr/bin/seq
coreutils: /usr/bin/sha1sum
coreutils: /usr/bin/sha224sum
coreutils: /usr/bin/sha256sum
coreutils: /usr/bin/sha384sum
coreutils: /usr/bin/sha512sum
coreutils: /usr/bin/shred
coreutils: /usr/bin/shuf
coreutils: /usr/bin/sort
coreutils: /usr/bin/split
coreutils: /usr/bin/stat
coreutils: /usr/bin/stdbuf
coreutils: /usr/bin/sum
coreutils: /usr/bin/tac
coreutils: /usr/bin/tail
coreutils: /usr/bin/tee
coreutils: /usr/bin/test
coreutils: /usr/bin/timeout
coreutils: /usr/bin/tr
coreutils: /usr/bin/truncate
coreutils: /usr/bin/tsort
coreutils: /usr/bin/tty
coreutils: /usr/bin/unexpand
coreutils: /usr/bin/uniq
coreutils: /usr/bin/unlink
coreutils: /usr/bin/users
coreutils: /usr/bin/wc
coreutils: /usr/bin/who
coreutils: /usr/bin/whoami
coreutils: /usr/bin/yes
coreutils: /usr/sbin/chroot
dash: /bin/dash
dash: /bin/sh
debconf: /usr/bin/debconf
debconf: /usr/bin/debconf-apt-progress
debconf: /usr/bin/debconf-communicate
debconf: /usr/bin/debconf-copydb
debconf: /usr/bin/debconf-escape
debconf: /usr/bin/debconf-set-selections
debconf: /usr/bin/debconf-show
debconf: /usr/sbin/dpkg-preconfigure
debconf: /usr/sbin/dpkg-reconfigure
debianutils: /bin/run-parts
debianutils: /bin/tempfile
debianutils: /bin/which
debianutils: /sbin/installkernel
debianutils: /usr/bin/ischroot
debianutils: /usr/bin/savelog
debianutils: /usr/sbin/add-shell
debianutils: /usr/sbin/remove-shell
diffutils: /usr/bin/cmp
diffutils: /usr/bin/diff
diffutils: /usr/bin/diff3
diffutils: /usr/bin/sdiff
diversion by dash from: /bin/sh
diversion by dash to: /bin/sh.distrib
dpkg: /sbin/start-stop-daemon
dpkg: /usr/bin/dpkg
dpkg: /usr/bin/dpkg-deb
dpkg: /usr/bin/dpkg-divert
dpkg: /usr/bin/dpkg-maintscript-helper
dpkg: /usr/bin/dpkg-query
dpkg: /usr/bin/dpkg-split
dpkg: /usr/bin/dpkg-statoverride
dpkg: /usr/bin/dpkg-trigger
dpkg: /usr/bin/update-alternatives
e2fsprogs: /sbin/badblocks
e2fsprogs: /sbin/debugfs
e2fsprogs: /sbin/dumpe2fs
e2fsprogs: /sbin/e2fsck
e2fsprogs: /sbin/e2image
e2fsprogs: /sbin/e2label
e2fsprogs: /sbin/e2mmpstatus
e2fsprogs: /sbin/e2undo
e2fsprogs: /sbin/fsck.ext2
e2fsprogs: /sbin/fsck.ext3
e2fsprogs: /sbin/fsck.ext4
e2fsprogs: /sbin/logsave
e2fsprogs: /sbin/mke2fs
e2fsprogs: /sbin/mkfs.ext2
e2fsprogs: /sbin/mkfs.ext3
e2fsprogs: /sbin/mkfs.ext4
e2fsprogs: /sbin/resize2fs
e2fsprogs: /sbin/tune2fs
e2fsprogs: /usr/bin/chattr
e2fsprogs: /usr/bin/lsattr
e2fsprogs: /usr/sbin/e2freefrag
e2fsprogs: /usr/sbin/e4crypt
e2fsprogs: /usr/sbin/e4defrag
e2fsprogs: /usr/sbin/filefrag
e2fsprogs: /usr/sbin/mklost+found
fdisk: /sbin/cfdisk
fdisk: /sbin/fdisk
fdisk: /sbin/sfdisk
findutils: /usr/bin/find
findutils: /usr/bin/xargs
gpgv: /usr/bin/gpgv
grep: /bin/egrep
grep: /bin/fgrep
grep: /bin/grep
grep: /usr/bin/rgrep
gzip: /bin/gunzip
gzip: /bin/gzexe
gzip: /bin/gzip
gzip: /bin/uncompress
gzip: /bin/zcat
gzip: /bin/zcmp
gzip: /bin/zdiff
gzip: /bin/zegrep
gzip: /bin/zfgrep
gzip: /bin/zforce
gzip: /bin/zgrep
gzip: /bin/zless
gzip: /bin/zmore
gzip: /bin/znew
hostname: /bin/dnsdomainname
hostname: /bin/domainname
hostname: /bin/hostname
hostname: /bin/nisdomainname
hostname: /bin/ypdomainname
init-system-helpers: /usr/bin/deb-systemd-helper
init-system-helpers: /usr/bin/deb-systemd-invoke
init-system-helpers: /usr/sbin/invoke-rc.d
init-system-helpers: /usr/sbin/service
init-system-helpers: /usr/sbin/update-rc.d
libc-bin: /sbin/ldconfig
libc-bin: /usr/bin/catchsegv
libc-bin: /usr/bin/getconf
libc-bin: /usr/bin/getent
libc-bin: /usr/bin/iconv
libc-bin: /usr/bin/ldd
libc-bin: /usr/bin/locale
libc-bin: /usr/bin/localedef
libc-bin: /usr/bin/pldd
libc-bin: /usr/bin/tzselect
libc-bin: /usr/bin/zdump
libc-bin: /usr/sbin/iconvconfig
libc-bin: /usr/sbin/zic
libpam-modules-bin: /sbin/mkhomedir_helper
libpam-modules-bin: /sbin/pam_tally
libpam-modules-bin: /sbin/pam_tally2
libpam-modules-bin: /sbin/unix_chkpwd
libpam-modules-bin: /sbin/unix_update
libpam-modules-bin: /usr/sbin/pam_timestamp_check
libpam-runtime: /usr/sbin/pam-auth-update
libpam-runtime: /usr/sbin/pam_getenv
login: /bin/login
login: /usr/bin/faillog
login: /usr/bin/lastlog
login: /usr/bin/newgrp
login: /usr/bin/sg
login: /usr/sbin/nologin
mawk: /usr/bin/mawk
mount: /bin/mount
mount: /bin/umount
mount: /sbin/losetup
mount: /sbin/swapoff
mount: /sbin/swapon
ncurses-bin: /usr/bin/captoinfo
ncurses-bin: /usr/bin/clear
ncurses-bin: /usr/bin/infocmp
ncurses-bin: /usr/bin/infotocap
ncurses-bin: /usr/bin/reset
ncurses-bin: /usr/bin/tabs
ncurses-bin: /usr/bin/tic
ncurses-bin: /usr/bin/toe
ncurses-bin: /usr/bin/tput
ncurses-bin: /usr/bin/tset
passwd: /sbin/shadowconfig
passwd: /usr/bin/chage
passwd: /usr/bin/chfn
passwd: /usr/bin/chsh
passwd: /usr/bin/expiry
passwd: /usr/bin/gpasswd
passwd: /usr/bin/passwd
passwd: /usr/sbin/chgpasswd
passwd: /usr/sbin/chpasswd
passwd: /usr/sbin/cpgr
passwd: /usr/sbin/cppw
passwd: /usr/sbin/groupadd
passwd: /usr/sbin/groupdel
passwd: /usr/sbin/groupmems
passwd: /usr/sbin/groupmod
passwd: /usr/sbin/grpck
passwd: /usr/sbin/grpconv
passwd: /usr/sbin/grpunconv
passwd: /usr/sbin/newusers
passwd: /usr/sbin/pwck
passwd: /usr/sbin/pwconv
passwd: /usr/sbin/pwunconv
passwd: /usr/sbin/useradd
passwd: /usr/sbin/userdel
passwd: /usr/sbin/usermod
passwd: /usr/sbin/vigr
passwd: /usr/sbin/vipw
perl-base: /usr/bin/perl
perl-base: /usr/bin/perl5.28.1
sed: /bin/sed
sysvinit-utils: /bin/pidof
sysvinit-utils: /sbin/fstab-decode
sysvinit-utils: /sbin/killall5
tar: /bin/tar
tar: /usr/sbin/rmt-tar
tar: /usr/sbin/tarcat
tzdata: /usr/sbin/tzconfig
util-linux: /bin/dmesg
util-linux: /bin/findmnt
util-linux: /bin/lsblk
util-linux: /bin/more
util-linux: /bin/mountpoint
util-linux: /bin/su
util-linux: /bin/wdctl
util-linux: /sbin/agetty
util-linux: /sbin/blkdiscard
util-linux: /sbin/blkid
util-linux: /sbin/blkzone
util-linux: /sbin/blockdev
util-linux: /sbin/chcpu
util-linux: /sbin/ctrlaltdel
util-linux: /sbin/findfs
util-linux: /sbin/fsck
util-linux: /sbin/fsck.cramfs
util-linux: /sbin/fsck.minix
util-linux: /sbin/fsfreeze
util-linux: /sbin/fstrim
util-linux: /sbin/getty
util-linux: /sbin/hwclock
util-linux: /sbin/isosize
util-linux: /sbin/mkfs
util-linux: /sbin/mkfs.bfs
util-linux: /sbin/mkfs.cramfs
util-linux: /sbin/mkfs.minix
util-linux: /sbin/mkswap
util-linux: /sbin/pivot_root
util-linux: /sbin/raw
util-linux: /sbin/runuser
util-linux: /sbin/sulogin
util-linux: /sbin/swaplabel
util-linux: /sbin/switch_root
util-linux: /sbin/wipefs
util-linux: /sbin/zramctl
util-linux: /usr/bin/addpart
util-linux: /usr/bin/choom
util-linux: /usr/bin/chrt
util-linux: /usr/bin/delpart
util-linux: /usr/bin/fallocate
util-linux: /usr/bin/fincore
util-linux: /usr/bin/flock
util-linux: /usr/bin/getopt
util-linux: /usr/bin/i386
util-linux: /usr/bin/ionice
util-linux: /usr/bin/ipcmk
util-linux: /usr/bin/ipcrm
util-linux: /usr/bin/ipcs
util-linux: /usr/bin/last
util-linux: /usr/bin/lastb
util-linux: /usr/bin/linux32
util-linux: /usr/bin/linux64
util-linux: /usr/bin/lscpu
util-linux: /usr/bin/lsipc
util-linux: /usr/bin/lslocks
util-linux: /usr/bin/lslogins
util-linux: /usr/bin/lsmem
util-linux: /usr/bin/lsns
util-linux: /usr/bin/mcookie
util-linux: /usr/bin/mesg
util-linux: /usr/bin/namei
util-linux: /usr/bin/nsenter
util-linux: /usr/bin/partx
util-linux: /usr/bin/prlimit
util-linux: /usr/bin/rename.ul
util-linux: /usr/bin/resizepart
util-linux: /usr/bin/rev
util-linux: /usr/bin/setarch
util-linux: /usr/bin/setpriv
util-linux: /usr/bin/setsid
util-linux: /usr/bin/setterm
util-linux: /usr/bin/taskset
util-linux: /usr/bin/unshare
util-linux: /usr/bin/utmpdump
util-linux: /usr/bin/whereis
util-linux: /usr/bin/x86_64
util-linux: /usr/sbin/chmem
util-linux: /usr/sbin/fdformat
util-linux: /usr/sbin/ldattach
util-linux: /usr/sbin/readprofile
util-linux: /usr/sbin/rtcwake
 -->
