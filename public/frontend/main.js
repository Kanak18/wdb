document.addEventListener("DOMContentLoaded", function () {
  const header = document.getElementById("header");
  if (header) {
    window.addEventListener("scroll", () => {
      if (window.scrollY > 50) {
        header.classList.add("scrolled");
      } else {
        header.classList.remove("scrolled");
      }
    });
  }

  const hamburger = document.getElementById("hamburger");
  const navLinks = document.getElementById("navLinks");

  if (hamburger && navLinks) {
    hamburger.addEventListener("click", () => {
      hamburger.classList.toggle("active");
      navLinks.classList.toggle("active");

      if (navLinks.classList.contains("active")) {
        document.body.style.overflow = "hidden";
      } else {
        document.body.style.overflow = "";
      }
    });

    document.querySelectorAll(".nav-links a").forEach((link) => {
      link.addEventListener("click", () => {
        hamburger.classList.remove("active");
        navLinks.classList.remove("active");
        document.body.style.overflow = "";
      });
    });
  }

  const observerOptions = {
    threshold: 0.15,
    rootMargin: "0px 0px -50px 0px",
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry, index) => {
      if (entry.isIntersecting) {
        if (entry.target.classList.contains("approach-card")) {
          setTimeout(() => {
            entry.target.classList.add("visible");
          }, index * 100);
        } else {
          entry.target.classList.add("visible");
        }
      }
    });
  }, observerOptions);

  const animatedElements = document.querySelectorAll(
    ".animate-on-scroll, .animate-left, .animate-right, .animate-scale, .approach-card"
  );
  
  animatedElements.forEach((el) => {
    observer.observe(el);
  });

const contactForm = document.getElementById("contactForm");

if (contactForm) {
  contactForm.addEventListener("submit", function (e) {
    e.preventDefault();

    const btn = this.querySelector(".btn-submit");
    const alertBox = document.querySelector(".contact-alert-message");
    const originalText = btn.textContent;

    btn.textContent = "Sending...";
    btn.style.opacity = "0.8";
    btn.disabled = true;

    const formData = new FormData(this);

    fetch(this.action, {
      method: "POST",
      headers: {
        "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value,
        "Accept": "application/json"
      },
      body: formData
    })
    .then(response => response.json())
    .then(data => {

      // Reset form
      this.reset();

      // Show success message
      alertBox.style.display = "block";
      alertBox.textContent = "Thank you for your message. We will get back to you soon.";
      alertBox.style.background = "#52b788";
      alertBox.style.color = "#fff";

      // Button success state
      btn.textContent = "Message Sent!";
      btn.style.background = "#52b788";

      // Reset button after 3 seconds
      setTimeout(() => {
        btn.textContent = originalText;
        btn.style.background = "";
        btn.style.opacity = "1";
        btn.disabled = false;
        alertBox.style.display = "none";
      }, 3000);
    })
    .catch(() => {
      alertBox.style.display = "block";
      alertBox.textContent = "Something went wrong. Please try again.";
      alertBox.style.background = "red";

      btn.textContent = "Error!";
      btn.style.background = "red";
      btn.disabled = false;

      setTimeout(() => {
        alertBox.style.display = "none";
      }, 5000);
    });
  });
}

  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute("href"));
      if (target) {
        target.scrollIntoView({
          behavior: "smooth",
          block: "start",
        });
      }
    });
  });
});