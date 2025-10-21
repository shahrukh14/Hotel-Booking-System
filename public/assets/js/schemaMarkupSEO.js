document.addEventListener("DOMContentLoaded", function () {
    let schemaData = {
        "@context": "https://schema.org",
        "@type": "LodgingBusiness",
        "name": "Zulus Retreat - Short Term Rentals",
        "image": "https://zulusretreat.com/assets/img/zulu-retreat.jpg",
        "description": "Stay at Zulu's Retreat, a perfect alternative to Airbnb for short-term rentals in a luxury setting.",
        "address": {
            "@type": "7012 Bursey Rd",
            "addressLocality": "Fort Worth",
            "addressRegion": "Texas",
            "addressCountry": "United States"
        },
        "url": "https://zulusretreat.com/",
        "priceRange": "$$$",
        "telephone": "+1-234-567-890"
    }

    let script = document.createElement("script");
    script.type = "application/ld+json";
    script.textContent = JSON.stringify(schemaData);
    document.head.appendChild(script);
});
