## Quy trình cập nhật phiên bản mới từ Joinup vào Openroad

Joinup có một kho svn công cộng ở địa chỉ sau:
<https://joinup.ec.europa.eu/svn/joinup>. Nhánh `trunk` không sử dụng, thay vào đó, mỗi bản release mới sẽ được tạo một nhánh trong `tags` và được thông báo qua mail ở mailing list sau: <http://joinup.ec.europa.eu/mailman/listinfo/joinup-commits>.

Kho này không thực sự là một kho SVN để quản lý các commit thực hiện khi phát triển mà hoàn toàn chỉ dùng để lưu các phiên bản được release ra ngoài nên không khác gì tải tarball. Vì vậy, để cập nhật với upstream không cần phải sử dụng đến git-svn, thậm chí dùng có thể gây thêm một vài lỗi khó hiểu. Quy trình merge phiên bản upstream như sau (quy ước `$OPENROAD` là git repository của Openroad và `$SVN` là tên thư mục svn tải về):

    $ svn checkout <link đến phiên bản mới> $SVN
    $ cd $OPENROAD
    
    # Thực hiện merge trong một nhánh mới fork từ 'master'
    $ git checkout -b merge-svn master
    
    # Copy từ $SVN
    $ cp -R $SVN/* .
    
    $ git commit -a  # mẫu commit bên dưới
    $ git checkout master && git merge merge-svn
    
    # Xóa nhánh merge-svn
    $ git branch -D merge-svn

Nhập commit message theo mẫu sau:

    Import tag V1.4.4 revision 20
    
    SVN log line:
    r20 | mmedinam | 2013-08-30 23:02:37 +0700 (Fri, 30 Aug 2013)

Thông tin về revision và log line lấy ở lệnh `svn log` thực thi trong thư mục `$SVN`. Sau khi merge có thể xóa thư mục `$SVN` (không thể tái sử dụng do mỗi lần release Joinup lại tạo một tag mới).
