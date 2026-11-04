const imgs=["one.jpg","two.jpg","three.jpg"];let i=0;function show(){photo.src=imgs[i]}function next(){i=(i+1)%imgs.length;show()}function prev(){i=(i-1+imgs.length)%imgs.length;show()}
