- Cài đặt LAMP (ubuntu/Debian: tasksel install lamp-server hoặc apt-get install `tasksel --task-packages lamp-server`), cấu hình web server phải bật sẵn url rewrite (server.com/contact thay vì server.com/index.php?q=contact)
- tải và giải nén pressflow (alternative cho Drupal) vào thư mục web
- Copy thư mục sites của joinup vào root của pressflow: cp -r joinup/sites pressflow/
- (optional, cần nghiên cứu thêm) áp dụng các patch của joinup vào pressflow: (joinup/)sites/core_patches/apply_patches.sh
- Copy default.settings.php -> settings.php, thêm config cần thiết
- Tạo database bằng script có sẵn trong (joinup/)dbscripts/database_backups/
$ mysql -u root -p
mysql > create database joinup;
mysql > create user joinup;
mysql > grant all privileges on joinup.* to joinup@"localhost" identified by "<password>";
mysql > [^D]
$ mysql -u joinup -p < [tên file sql].sql
- Sửa thông tin database trong settings.php

/var/www/joinup/sites/all/modules/custom/isa_node_form/isa_node_form.module
Có một số vấn đề với include_paths, lúc nào cũng chỉ là nội dung default, không sử dụng cái trong drupal. -> src_adms/bootstrap.php mới lỗi.

- (optional nhưng cần cho ~60% tính năng của joinup) cài đặt hệ thống tìm kiếm solr
Tải solr 3.6.2 (chưa kiểm tra 4.4 có được không nhưng 3.6.2 là cùng thời kỳ với joinup).
Solr phải cài đặt cùng tomcat (chưa hiểu tại sao).

1. Tải solr, giải nén ở một thư mục nào đó bất kỳ, gọi thư mục này là $SOLR. Backup các file $SOLR/example/solr/conf/{schema.xml,solrconfig.xml,protwords.txt} và copy các file tương ứng từ $JOINUP/sites/all/modules/contributed/apachesolr/ vào thế chỗ.
2. Khởi động solr bằng cách lệnh `cd $SOLR/example && java -jar start.jar`
3. Kiểm tra solr đã hoạt động chưa bằng cách truy cập địa chỉ web: <http://localhost:8983/solr/admin/>