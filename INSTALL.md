### Cài đặt trang Joinup chính

Quy trình cài đặt Joinup cũng giống như cài đặt một site Drupal bình thường.

1. Cài đặt LAMP (Ubuntu/Debian: `tasksel install lamp-server` hoặc <code>apt-get install \`tasksel --task-packages lamp-server\`</code>), cấu hình web server phải bật sẵn url rewrite (server.com/contact thay vì server.com/index.php?q=contact)
2. Tải và giải nén Pressflow 6 (một bản phân phối Drupal) vào thư mục web, gọi thư mục này là `$JOINUP`, tải và giải nén (hoặc svn checkout, git clone) mã nguồn của Joinup vào thư mục nào đó bất kỳ, gọi là `$SRC`.
3. Copy thư mục `sites` của Joinup vào root của Pressflow: `cp -r $SRC/sites $JOINUP`
4. (**optional**) Apply các patch của Joinup vào Pressflow: `sh $JOINUP/sites/core_patches/apply_patches.sh` (*cần nghiên cứu thêm mục đích của các patch này, có vẻ chủ yếu là để hỗ trợ cài đặt với proxy*)
5. Tạo database bằng script có sẵn trong `$SRC/dbscripts/database_backups/V1.4.3.p4_clean_backup.sql.gz` (cần giải nén thành file *.sql thông thường)
    
        $ mysql -u root -p
        mysql > create database joinup;
        mysql > create user joinup;
        mysql > grant all privileges on joinup.* to joinup@"localhost" identified by "<password>";
        mysql > [^D]
        $ mysql -u joinup -p joinup < V1.4.3.p4_clean_backup.sql

6. Copy `$JOINUP/sites/default/default.settings.php` -> `$JOINUP/sites/default/settings.php`, thêm thông tin về database mới tạo ở bước trên.

**NOTES**
Trong `settings.php` cần thêm một dòng như sau, nhớ thay thế `$JOINUP` thành đường dẫn tuyệt đối phù hợp:

    $conf['adms_lib_path'] = '$JOINUP/src_adms';


### Cài đặt Solr

Solr là hệ thống lập chỉ mục tìm kiếm. Tuy optional nhưng cần cho ~40% tính năng của joinup. Bản chúng ta sử dụng là 3.6.2 (chưa tìm hiểu 4.4 có hoạt động không nhưng 3.6.2 cùng thời kỳ ra đời với bản joinup hiện tại).


1. Tải Solr, giải nén ở một thư mục nào đó bất kỳ, gọi thư mục này là `$SOLR`. Backup các file `$SOLR/example/solr/conf/{schema.xml,solrconfig.xml,protwords.txt}` và copy các file tương ứng từ `$JOINUP/sites/all/modules/contributed/apachesolr/` vào thế chỗ.
2. Khởi động Solr bằng cách chạy lệnh `cd $SOLR/example && java -jar start.jar`
3. Kiểm tra Solr đã hoạt động chưa bằng cách truy cập địa chỉ web: <http://localhost:8983/solr/admin/>


### Kết nối Solr với Tomcat

Solr phải cài đặt cùng tomcat (chưa hiểu tại sao).

1. Tạo file `$TOMCAT/conf/Catalina/localhost/solr.xml`

        <?xml version="1.0" encoding="utf-8"?>
             <Context docBase="/path/to/solr/apache-solr.war" debug="1" crossContext="true">
             <Environment name="solr/home" type="java.lang.String" value="/path/to/solr/" override="true"/>
        </Context>
2. Khởi động tomcat bằng lệnh `$TOMCAT/bin/startup.sh`. Truy cập trang điều khiển Solr từ Tomcat bằng địa chỉ <http://localhost:8080/solr>.
