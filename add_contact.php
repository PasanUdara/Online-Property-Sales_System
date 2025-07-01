<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <link rel="stylesheet" href="style/contact_us.css" />
    <script>
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    </script>
  </head>
  <body>
    <div class="container">
      <div class="form">
        <div class="contact-info">
          <h3 class="title">Let's get in touch</h3>
          <p class="text">
            Got questions? Fill out the form below, and OPSS will respond promptly.
            We look forward to connecting with you!
          </p>

          <div class="info">
            <div class="information">
              <img src="images/location.png" class="icon" alt="" />
              <p></p>
            </div>
            <div class="information">
              <img src="images/email.png" class="icon" alt="" />
              <p>Oppsicloud.com</p>
            </div>
            <div class="information">
              <img src="images/phone.png" class="icon" alt="" />
              <p>+94 70 450 230</p>
            </div>
          </div>

          <div class="social-media">
            <p>Connect with us :</p>
            <div class="social-icons">
              <a href="https://www.facebook.com" target="_blank">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="https://www.tiktok.com" target="_blank">
                <i class="fab fa-tiktok"></i>
              </a>
              <a href="https://www.instagram.com" target="_blank">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="https://maps.app.goo.gl/xR77eseZEca8P89p7" target="_blank">
                <i class="fas fa-map-marker-alt"></i>
              </a>
            </div>
          </div>
        </div>

        <div class="contact-form">
          

          <form action="contact.php" method="POST" autocomplete="off">
            <h3 class="title">Contact us</h3>
            <div class="input-container">
              <input type="text" name="name" class="input" required />
              <label for="name">Name</label>
              <span>Name</span>
            </div>
            <div class="input-container">
              <input type="email" name="email" class="input" required />
              <label for="email">Email</label>
              <span>Email</span>
            </div>
            <div class="input-container">
              <input type="tel" name="phone" class="input" required />
              <label for="phone">Phone</label>
              <span>Phone</span>
            </div>
            <div class="input-container textarea">
              <textarea name="message" class="input" required></textarea>
              <label for="message">Message</label>
              <span>Message</span>
            </div>
            <input type="submit" value="Send" class="btn" />
          </form>
        </div>
      </div>
    </div>

    <script src="app.js"></script>
  </body>
</html>
