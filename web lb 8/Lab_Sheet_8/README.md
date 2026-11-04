# The Daily Crumb — Lab Sheet 8 Solution

A responsive fictional artisan bakery website built with semantic HTML5, CSS Grid/Flexbox and vanilla JavaScript.

## Files
- `index.html` — semantic page structure, SEO/Open Graph metadata, accessible images, menu, team, testimonials, booking form, map and social links.
- `styles.css` — mobile-first responsive layout, typography, palette, spacing, focus-friendly controls and reduced-motion support.
- `script.js` — hero carousel controls, responsive navigation and client-side reservation validation.

## Run locally
1. Extract the ZIP folder.
2. Open the folder in Visual Studio Code.
3. Install/use the **Live Server** extension, then right-click `index.html` and choose **Open with Live Server**.
4. Alternatively, run `python -m http.server 8000` from this folder and open `http://localhost:8000`.

## Customisation
The sample business is **The Daily Crumb**, a fictional bakery in Roorkee. Replace the sample address, phone number, social links, menu items and images with client-approved details.

## Notes
- The Google Maps iframe is a sample location search for Roorkee; replace it with the client's exact Google Maps embed URL.
- The form performs browser-side validation and displays a confirmation message. It does not send or store bookings because no backend service is configured.
- Images and Google Fonts are loaded from external services and need an internet connection.
- For production, compress and self-host images, minify CSS/JS, connect the form to a secure backend, and test with Lighthouse and real devices.
- Test current Chrome, Firefox, Edge and Safari versions. Automated checks should be supplemented with keyboard and screen-reader testing.

## Design rationale
- **Colours:** warm cream and brown tones communicate a welcoming artisan bakery; muted sage provides a calm contrast; rust highlights important actions.
- **Typography:** Playfair Display gives headings a crafted editorial feel, while DM Sans keeps navigation and body text readable.
- **Audience:** neighbourhood residents, students, families and people looking for fresh baked goods or a relaxed café visit.
- **Layout:** mobile-first single-column sections expand into CSS Grid layouts on wider screens; Flexbox is used for navigation, controls and grouped content.
