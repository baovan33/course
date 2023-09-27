## Database

1 Category -> Quản lý danh mục
- id
- name
- slug
- parent_id

2 Courses -> Quản lý khoá học
- id
- name
- slug
- detail
- tacher_id
- thumbnail
- price
- sale_price
- code
- durations
- is_document 
- supports
- status

3 Lessions -> Quản lý bài giảng
- id
- name
- slug
- video_id
- document_id
- parent_id
- is_trial
- views
- -description
- position
- duration_lession 

4 Categoies_courses -> trung gian giữa category&course
- id
- category_id
- course_id

5 Teacher -> Quản lý giáo viên
- id
- name
- slug
- image
- description
- exp

6 Video => Quản lý video
- id
- name
- url

7 Documents => Quản lý tài liệu
- id
- name
- url
- size 

8 Category_post => Quản lý danh mục tin tức
- id
- name
- slug
- parent_id

9 Posts => Quản lý tin tức
- id
- title
- slug
- content
- exceprt
- thumbnail
- category_id

10 Students => Quản lý học viên
- id
- name
- email
- password
- phone
- address
- status

11 Student_courses => trung gian học viên và khoá học
- id
- course_id
- student_id

12 Orders => quản lý đơn đăng kí của học viên
- id
- student_id
- status
- total

13 orders_detail => Chi tiết đơn hàng
- id
- order_id
- course_id
- price

14 orders_status => quản lý trạng thái đơn hàng
- id
- name

15 user => quản trị hệ thống
- id
- name
- email
- password
- group_id

16 groups => quản trị nhóm người dùng
- id
- name
- permissions

17 modules => danh sách module 
- id
- name
- title
- role

18 Options => Quản lý các thiết lập
- id
- name
- value
