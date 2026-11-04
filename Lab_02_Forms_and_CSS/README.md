# Lab Sheet 2 — HTML Forms and CSS

Questions are reproduced from the supplied lab sheet. Each practical has a topic and a sample answer.

## Q1. Form controls with external CSS
**Question:** Create a form with text, password, radio, checkbox, select and textarea, styled with external CSS.

**Answer:**
```html
<!-- index.html -->
<form class="form"><input placeholder="Name"><input type="password" placeholder="Password"><label><input type="radio" name="g"> Male</label><label><input type="checkbox"> News</label><select><option>Choose city</option></select><textarea placeholder="Message"></textarea></form>
<link rel="stylesheet" href="style.css">
/* style.css */
.form{display:grid;gap:12px;max-width:420px}.form input,.form select,.form textarea{padding:10px;border:1px solid #aaa;border-radius:5px}
```

## Q2. HTML5 validation
**Question:** Create a student registration form using required, minlength, maxlength, pattern and email validation.

**Answer:**
```html
<form><input required minlength="3" maxlength="20" pattern="[A-Za-z ]+" placeholder="Full name"><input type="email" required placeholder="Email"><button>Register</button></form>
```

## Q3. Legacy frameset
**Question:** Create navigation, header and content frames using frameset/frame (legacy practice).

**Answer:**
```html
<!-- Legacy only; frameset is not supported in HTML5 -->
<html><frameset rows="20%,80%"><frame src="header.html"><frameset cols="25%,75%"><frame src="nav.html"><frame src="content.html"></frameset></frameset></html>
```

## Q4. Flexbox layout
**Question:** Replicate a frame-like layout using CSS Flexbox.

**Answer:**
```html
<div class="layout"><header>Header</header><nav>Navigation</nav><main>Content</main></div>
<style>.layout{display:flex;flex-wrap:wrap;gap:10px}.layout header{flex-basis:100%;background:#ddd;padding:15px}.layout nav{width:25%;background:#eee;padding:15px}.layout main{flex:1;padding:15px}</style>
```

## Q5. Login card
**Question:** Create a centered login card using box-shadow, border-radius and positioning.

**Answer:**
```html
<div class="card"><h2>Login</h2><input placeholder="Username"><input type="password" placeholder="Password"><button>Login</button></div>
<style>.card{width:280px;margin:60px auto;padding:25px;box-shadow:0 2px 12px #999;border-radius:12px;text-align:center}.card input{display:block;margin:12px 0;padding:10px;width:90%}</style>
```

## Q6. CSS Grid form
**Question:** Arrange form fields in a two-column CSS Grid.

**Answer:**
```html
<form class="grid"><input placeholder="First name"><input placeholder="Last name"><input placeholder="Email"><input placeholder="Phone"><button>Submit</button></form>
<style>.grid{display:grid;grid-template-columns:1fr 1fr;gap:12px;max-width:500px}.grid input{padding:10px}</style>
```

## Q7. Focus effects
**Question:** Change input border and background on :focus.

**Answer:**
```html
<input placeholder="Enter feedback"><style>input:focus{outline:none;border:2px solid #2878d0;background:#eef6ff}</style>
```

## Q8. File upload and button states
**Question:** Create a file upload form and styled submit button with hover/active transitions.

**Answer:**
```html
<form><input type="file"><button class="send">Upload</button></form><style>.send{padding:10px 20px;transition:.3s}.send:hover{background:#2878d0;color:white}.send:active{transform:scale(.96)}</style>
```

## Q9. Grouped survey
**Question:** Use fieldset and legend with custom spacing.

**Answer:**
```html
<form><fieldset><legend>Feedback</legend><label><input type="radio" name="rate">Good</label><label><input type="radio" name="rate">Average</label></fieldset></form><style>fieldset{padding:18px;margin:15px;border:1px solid #888}legend{font-weight:bold}</style>
```

## Q10. Styled data table
**Question:** Create a data-entry table with alternating rows and hover effect.

**Answer:**
```html
<table><tr><th>Name</th><th>Marks</th></tr><tr><td>Aman</td><td>80</td></tr><tr><td>Riya</td><td>90</td></tr></table><style>table{border-collapse:collapse}td,th{padding:10px;border:1px solid #aaa}tr:nth-child(even){background:#eee}tr:hover{background:#ddd}</style>
```

## Q11. CSS methods and specificity
**Question:** Demonstrate inline, internal and external CSS on a contact form.

**Answer:**
```html
<style>/* external stylesheet can also style this form */ .contact{color:navy}</style><form class="contact" style="font-family:Arial"><input placeholder="Name"><button>Send</button></form>
<!-- Inline style has highest priority; then specificity/order apply. -->
```

## Q12. Responsive checkout
**Question:** Use media queries to adjust payment form on mobile.

**Answer:**
```html
<form class="pay"><input placeholder="Cardholder"><input placeholder="Card number"><button>Pay</button></form><style>.pay input{width:320px;padding:10px}@media(max-width:600px){.pay input{width:90%}}</style>
```

## Q13. Custom controls
**Question:** Style checkboxes and radio buttons using pseudo-elements and sibling selectors.

**Answer:**
```html
<label class="choice"><input type="checkbox"><span>Subscribe</span></label><style>.choice input{accent-color:green}.choice span{margin-left:5px}</style>
<!-- ::before/::after can decorate a custom label; native accent-color is simpler and accessible. -->
```

## Q14. Range slider
**Question:** Add range and number inputs with live value label.

**Answer:**
```html
<input id="range" type="range" min="0" max="100" value="50"><input id="num" type="number" value="50"><output id="out">50</output><script>range.oninput=()=>{num.value=out.value=range.value};num.oninput=()=>{range.value=out.value=num.value}</script>
```

## Q15. Expanding search
**Question:** Expand search input smoothly on focus.

**Answer:**
```html
<input class="search" placeholder="Search"><style>.search{width:120px;transition:width .4s}.search:focus{width:260px}</style>
```

## Q16. Float and clear
**Question:** Align employee evaluation form using float and clear.

**Answer:**
```html
<form><div style="float:left;width:45%"><label>Employee <input></label></div><div style="float:left;width:45%"><label>Rating <input type="number"></label></div><div style="clear:both"></div><button>Submit</button></form>
```

## Q17. Hidden input
**Question:** Use a hidden field to pass a non-sensitive form reference value.

**Answer:**
```html
<form><input type="hidden" name="form_id" value="registration_v1"><input name="name" placeholder="Name"><button>Send</button></form>
<!-- Hidden fields are editable by users; never store secrets or trust them for authorization. -->
```

## Q18. Contact page
**Question:** Place contact form and company details side-by-side using Flexbox.

**Answer:**
```html
<div class="contact"><form><h2>Contact us</h2><input placeholder="Name"><input placeholder="Email"><button>Send</button></form><aside>Office: Main Road<br>Email: info@example.com</aside></div><style>.contact{display:flex;gap:30px;flex-wrap:wrap}.contact>*{flex:1;min-width:230px}</style>
```

## Q19. Typography
**Question:** Apply font-family, line-height, letter-spacing and text-transform.

**Answer:**
```html
<form><label class="label">FULL NAME<input placeholder="Your name"></label></form><style>.label{font-family:Arial;letter-spacing:1px;text-transform:uppercase;line-height:2}input{font-size:16px}</style>
```

## Q20. Multi-step layout
**Question:** Simulate steps using display none/block.

**Answer:**
```html
<section id="step1">Step 1 <button type="button" onclick="step1.style.display='none';step2.style.display='block'">Next</button></section><section id="step2" style="display:none">Step 2</section>
```

## Q21. Accessible labels
**Question:** Connect each input to label using for and id.

**Answer:**
```html
<label for="email">Email</label><input id="email" name="email" type="email">
```

## Q22. Floating label
**Question:** Create newsletter input with floating label effect.

**Answer:**
```html
<div class="field"><input id="mail" placeholder=" "><label for="mail">Email address</label></div><style>.field{position:relative;margin:25px}.field input{padding:12px}.field label{position:absolute;left:10px;top:12px;transition:.2s}.field input:focus+label,.field input:not(:placeholder-shown)+label{top:-18px;font-size:12px}</style>
```
