<link rel="stylesheet" href="../../../../Styles/Admin/email.css">
<div id="email-modal" class="modal-email-user">
        <div class="modal-content-email-user">
          <span class="close" id="close-btn">&times;</span>
          <form action="../BackEnd/Email.php" method="post">
            <label for="to">To:</label><br>
            <input type="email" id="to-email-user" name="to-email" required> <br>
            <label for="subject">Subject:</label><br>
            <input type="text" id="subject-email-user" name="subject-email" required> <br>
            <label for="message">Message:</label><br>
            <textarea id="message-email-user" name="message-email" required></textarea> <br>
            <button type="submit" id="submit-email-user" name="submit-email">Send</button>
          </form>
        </div>
      </div>

      