<link rel="stylesheet" href="./Asset/bootstrap-4.0.0-dist/css/bootstrap.min.css">


<div class="modal fade" id="courseDetailModal" tabindex="-1" role="dialog" aria-labelledby="courseDetailModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="courseDetailModalLabel">Information aboout course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Đóng">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="courseDetailContent"></div>
      </div>
    </div>
  </div>
</div>


<script>
// Lấy danh sách các nút "Detail"
const detailBtns = document.querySelectorAll('.detail-btn');

// Duyệt qua từng nút "Detail" và gắn sự kiện click
detailBtns.forEach(function(btn) {
    btn.addEventListener('click', function(e) {
        e.preventDefault();
        
        // Lấy ID của khóa học từ thuộc tính data-id của nút "Detail"
        const courseId = this.dataset.id;

        // Gửi yêu cầu GET đến trang xử lý hiển thị thông tin chi tiết khóa học
        fetch(`./src/views/detail_course.php?id=${courseId}`)
            .then(response => response.text())
            .then(html => {
                // Tạo modal và chèn nội dung trả về từ trang xử lý vào modal
                const modal = document.createElement('div');
                modal.classList.add('modal');
                modal.innerHTML = html;

                // Hiển thị modal lên màn hình
                document.body.appendChild(modal);

                // Gắn sự kiện click cho nút "Đăng ký" trong modal
                const registerBtn = modal.querySelector('.register-btn');
                if (registerBtn) {
                    registerBtn.addEventListener('click', function() {
                        const studentName = modal.querySelector('.student-name').value;
                        const studentEmail = modal.querySelector('.student-email').value;

                        // Gửi yêu cầu POST đến trang xử lý đăng ký khóa học
                        fetch('./src/controllers/register_course.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                courseId: courseId,
                                studentName: studentName,
                                studentEmail: studentEmail
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            alert(data.message);
                            modal.remove();
                        })
                        .catch(error => {
                            console.error(error);
                        });
                    });
                }
            })
            .catch(error => {
                console.error(error);
            });
    });
});

