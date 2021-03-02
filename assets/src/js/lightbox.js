var SimpleLightbox = require('simple-lightbox');

// Accordion
export const simpleLightboxComponent = () => {
    console.log("simple lightbox init");
    new SimpleLightbox({ elements: 'figure > a' });
}