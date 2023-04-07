<?php
$sql = "
CREATE TRIGGER `add_course_student` AFTER INSERT ON `order_detail` FOR EACH ROW
BEGIN
    INSERT INTO `course_student` (`course_id`, `student_id`)
    VALUES (NEW.`course_id`, NEW.`student_id`);
END;
";

mysqli_query($conn, $sql);

?>