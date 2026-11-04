# Lab Sheet 1 — HTML Basics

Each item includes the practical question, topic and a sample answer.

## Q1. HTML document structure
**Question:** Create a basic HTML5 webpage with required tags, heading and hobby paragraph.

**Answer:**
```html
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>My Hobby</title></head>
<body>
  <h1>My Favourite Hobby</h1>
  <p>My favourite hobby is reading books because it improves my knowledge.</p>
</body>
</html>
```

## Q2. Text formatting
**Question:** Demonstrate bold, italic, underline and strikethrough tags.

**Answer:**
```html
<!DOCTYPE html><html><body>
<p><b>Bold</b> and <strong>Important</strong></p>
<p><i>Italic</i> and <em>Emphasized</em></p>
<p><u>Underlined</u></p><p><del>Deleted text</del></p>
</body></html>
```

## Q3. Heading hierarchy
**Question:** Show all six heading levels with paragraphs.

**Answer:**
```html
<!DOCTYPE html><html><body>
<h1>Heading 1</h1><p>Main title</p><h2>Heading 2</h2><p>Section</p>
<h3>Heading 3</h3><p>Sub-section</p><h4>Heading 4</h4><p>Detail</p>
<h5>Heading 5</h5><p>Smaller detail</p><h6>Heading 6</h6><p>Smallest heading</p>
</body></html>
```

## Q4. Quotation and citation
**Question:** Use blockquote, q and cite tags.

**Answer:**
```html
<!DOCTYPE html><html><body>
<blockquote>Knowledge is power.</blockquote>
<p>As the saying goes, <q>Practice makes perfect.</q></p>
<p><cite>Common proverb</cite></p>
</body></html>
```

## Q5. Horizontal rule and line break
**Question:** Create a recipe page using hr and br.

**Answer:**
```html
<!DOCTYPE html><html><body><h1>Tea Recipe</h1>
<h2>Ingredients</h2><p>Water, tea leaves, milk and sugar.</p><hr>
<h2>Steps</h2><p>Boil water.<br>Add tea leaves.<br>Add milk and sugar.<br>Serve hot.</p>
<hr><address>Recipe by Student<br>India</address></body></html>
```

## Q6. Unordered list
**Question:** Create a list of five favourite movies.

**Answer:**
```html
<!DOCTYPE html><html><body><h2>Favourite Movies</h2>
<ul><li>Movie One</li><li>Movie Two</li><li>Movie Three</li><li>Movie Four</li><li>Movie Five</li></ul>
</body></html>
```

## Q7. Ordered list
**Question:** Create a step-by-step guide.

**Answer:**
```html
<!DOCTYPE html><html><body><h2>Steps to Start a Computer</h2>
<ol><li>Switch on the power.</li><li>Press the power button.</li><li>Wait for the system to start.</li><li>Log in.</li></ol>
</body></html>
```

## Q8. Description list
**Question:** Create a computer science glossary.

**Answer:**
```html
<!DOCTYPE html><html><body><h2>Glossary</h2><dl>
<dt>CPU</dt><dd>Central Processing Unit.</dd>
<dt>HTML</dt><dd>Language used to structure web pages.</dd>
<dt>RAM</dt><dd>Temporary computer memory.</dd></dl></body></html>
```

## Q9. Nested list
**Question:** Represent a university course structure.

**Answer:**
```html
<!DOCTYPE html><html><body><h2>University Courses</h2><ul>
<li>MCA<ul><li>Semester 1<ul><li>HTML</li><li>Programming</li></ul></li><li>Semester 2</li></ul></li>
<li>BCA<ul><li>Semester 1</li><li>Semester 2</li></ul></li></ul></body></html>
```

## Q10. Ordered list styles
**Question:** Use Roman numerals and lowercase letters.

**Answer:**
```html
<!DOCTYPE html><html><body><ol type="I"><li>HTML</li><li>CSS</li></ol>
<ol type="a"><li>Input</li><li>Process</li><li>Output</li></ol></body></html>
```

## Q11. Insert image
**Question:** Use img with src and alt.

**Answer:**
```html
<!DOCTYPE html><html><body><img src="images/photo.jpg" alt="Sample photograph"></body></html>
```

## Q12. Image dimensions
**Question:** Set image width and height.

**Answer:**
```html
<!DOCTYPE html><html><body><img src="images/photo.jpg" alt="Sample" width="300" height="200"></body></html>
```

## Q13. Clickable image
**Question:** Link an image to an external website.

**Answer:**
```html
<!DOCTYPE html><html><body><a href="https://www.wikipedia.org">
<img src="images/photo.jpg" alt="Open Wikipedia" width="250"></a></body></html>
```

## Q14. Figure and caption
**Question:** Use figure and figcaption.

**Answer:**
```html
<!DOCTYPE html><html><body><figure>
<img src="images/photo.jpg" alt="A landscape" width="350">
<figcaption>A beautiful landscape photograph.</figcaption>
</figure></body></html>
```

## Q15. Local and external images
**Question:** Show images from local folder and external URL.

**Answer:**
```html
<!DOCTYPE html><html><body>
<img src="images/local.jpg" alt="Local image" width="200">
<img src="https://placehold.co/200x120" alt="External sample image" width="200">
</body></html>
```

## Q16. HTML table
**Question:** Create a 3-row, 3-column student table.

**Answer:**
```html
<!DOCTYPE html><html><body><table border="1">
<tr><th>ID</th><th>Name</th><th>Course</th></tr>
<tr><td>1</td><td>Aman</td><td>MCA</td></tr>
<tr><td>2</td><td>Riya</td><td>MCA</td></tr>
</table></body></html>
```

## Q17. Table caption
**Question:** Create a product price table.

**Answer:**
```html
<!DOCTYPE html><html><body><table border="1">
<caption>Product Price List</caption><tr><th>Product</th><th>Price</th></tr>
<tr><td>Keyboard</td><td>500</td></tr><tr><td>Mouse</td><td>300</td></tr>
</table></body></html>
```

## Q18. Colspan
**Question:** Create a timetable with a merged cell.

**Answer:**
```html
<!DOCTYPE html><html><body><table border="1">
<tr><th>Day</th><th>9 AM</th><th>10 AM</th></tr>
<tr><td>Monday</td><td colspan="2">Web Lab</td></tr>
</table></body></html>
```

## Q19. Rowspan
**Question:** Merge table cells vertically.

**Answer:**
```html
<!DOCTYPE html><html><body><table border="1">
<tr><th>Department</th><th>Student</th></tr>
<tr><td rowspan="2">Computer</td><td>Aman</td></tr>
<tr><td>Riya</td></tr></table></body></html>
```

## Q20. Semantic table sections
**Question:** Use thead, tbody and tfoot.

**Answer:**
```html
<!DOCTYPE html><html><body><table border="1">
<thead><tr><th>Item</th><th>Amount</th></tr></thead>
<tbody><tr><td>Books</td><td>500</td></tr><tr><td>Travel</td><td>200</td></tr></tbody>
<tfoot><tr><th>Total</th><th>700</th></tr></tfoot></table></body></html>
```

## Q21. Registration form
**Question:** Create first name, last name, email and submit fields.

**Answer:**
```html
<!DOCTYPE html><html><body><form>
<label>First Name: <input type="text" name="first"></label><br>
<label>Last Name: <input type="text" name="last"></label><br>
<label>Email: <input type="email" name="email"></label><br>
<button type="submit">Register</button></form></body></html>
```

## Q22. Radio buttons and checkboxes
**Question:** Add gender radio buttons and hobby checkboxes.

**Answer:**
```html
<!DOCTYPE html><html><body><form>
Gender: <label><input type="radio" name="gender" value="male">Male</label>
<label><input type="radio" name="gender" value="female">Female</label><br>
Hobbies: <label><input type="checkbox" name="hobby" value="reading">Reading</label>
<label><input type="checkbox" name="hobby" value="sports">Sports</label>
</form></body></html>
```

## Q23. Dropdown menu
**Question:** Allow users to select a city.

**Answer:**
```html
<!DOCTYPE html><html><body><label>City:
<select name="city"><option>Meerut</option><option>Delhi</option><option>Roorkee</option></select>
</label></body></html>
```

## Q24. Feedback form
**Question:** Use textarea and file upload.

**Answer:**
```html
<!DOCTYPE html><html><body><form>
<label>Comments:<textarea name="comments"></textarea></label><br>
<label>Attach file:<input type="file" name="file"></label><br>
<button type="submit">Send</button></form></body></html>
```

## Q25. Fieldset and legend
**Question:** Group related survey fields.

**Answer:**
```html
<!DOCTYPE html><html><body><form>
<fieldset><legend>Personal Details</legend>
<label>Name: <input type="text" name="name"></label><br>
<label>Email: <input type="email" name="email"></label></fieldset>
<button type="submit">Submit</button></form></body></html>
```
