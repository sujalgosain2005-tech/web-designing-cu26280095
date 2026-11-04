// Interactive navigation, hero carousel and reservation validation.
const slides = [
  { image: "https://images.unsplash.com/photo-1509440159596-0249088772ff?w=1800", label: "01 / 03" },
  { image: "https://images.unsplash.com/photo-1555507036-ab1f4038808a?w=1800", label: "02 / 03" },
  { image: "https://images.unsplash.com/photo-1517433670267-08bbd4be890f?w=1800", label: "03 / 03" }
];
let currentSlide = 0;
const hero = document.querySelector(".hero");
const status = document.getElementById("slideStatus");
function showSlide(index) {
  currentSlide = (index + slides.length) % slides.length;
  hero.style.backgroundImage = `url("${slides[currentSlide].image}")`;
  status.textContent = slides[currentSlide].label;
}
document.getElementById("previousSlide").addEventListener("click", () => showSlide(currentSlide - 1));
document.getElementById("nextSlide").addEventListener("click", () => showSlide(currentSlide + 1));

const menuToggle = document.getElementById("menuToggle");
const navLinks = document.getElementById("navLinks");
menuToggle.addEventListener("click", () => {
  const isOpen = navLinks.classList.toggle("open");
  menuToggle.setAttribute("aria-expanded", String(isOpen));
  menuToggle.setAttribute("aria-label", isOpen ? "Close navigation menu" : "Open navigation menu");
});
navLinks.querySelectorAll("a").forEach(link => link.addEventListener("click", () => {
  navLinks.classList.remove("open");
  menuToggle.setAttribute("aria-expanded", "false");
}));

const dateInput = document.getElementById("bookingDate");
dateInput.min = new Date().toISOString().split("T")[0];
document.getElementById("year").textContent = new Date().getFullYear();

document.getElementById("bookingForm").addEventListener("submit", event => {
  event.preventDefault();
  const form = event.currentTarget;
  const message = document.getElementById("formMessage");
  if (!form.checkValidity()) {
    form.reportValidity();
    message.textContent = "Please complete all required fields with valid details.";
    return;
  }
  const name = document.getElementById("guestName").value.trim();
  const date = dateInput.value;
  if (new Date(date + "T00:00:00") < new Date(new Date().toDateString())) {
    message.textContent = "Please select today or a future date.";
    dateInput.focus();
    return;
  }
  message.textContent = `Thank you, ${name}! Your reservation request has been received. We’ll contact you to confirm.`;
  form.reset();
  dateInput.min = new Date().toISOString().split("T")[0];
});
