/**
 * 404 Page Script & Tailwind Configuration
 */
tailwind.config = {
    darkMode: "class",
    theme: {
        extend: {
            "colors": {
                "on-primary-fixed": "#001944",
                "surface-container-highest": "#e5e2e1",
                "on-secondary": "#ffffff",
                "background": "#fcf9f8",
                "surface-container-low": "#f6f3f2",
                "tertiary-fixed-dim": "#c4c7ca",
                "tertiary-container": "#717578",
                "on-secondary-fixed-variant": "#454748",
                "on-primary-container": "#fefcff",
                "on-error-container": "#93000a",
                "on-secondary-fixed": "#191c1d",
                "surface-container-high": "#ebe7e7",
                "secondary-fixed": "#e1e3e4",
                "surface-tint": "#0059c7",
                "on-tertiary-container": "#fbfdff",
                "on-tertiary-fixed-variant": "#43474a",
                "surface-dim": "#dcd9d9",
                "secondary": "#5c5f60",
                "outline": "#727786",
                "outline-variant": "#c2c6d7",
                "on-primary-fixed-variant": "#004299",
                "surface-container-lowest": "#ffffff",
                "primary-fixed": "#d9e2ff",
                "on-surface-variant": "#424754",
                "on-tertiary-fixed": "#181c1e",
                "surface": "#fcf9f8",
                "on-background": "#1c1b1b",
                "secondary-fixed-dim": "#c5c7c8",
                "secondary-container": "#e1e3e4",
                "inverse-surface": "#313030",
                "inverse-on-surface": "#f3f0ef",
                "tertiary": "#585c5f",
                "inverse-primary": "#afc6ff",
                "on-surface": "#1c1b1b",
                "error": "#ba1a1a",
                "on-error": "#ffffff",
                "error-container": "#ffdad6",
                "surface-bright": "#fcf9f8",
                "on-primary": "#ffffff",
                "on-secondary-container": "#626566",
                "primary-fixed-dim": "#afc6ff",
                "primary": "#0057c3",
                "on-tertiary": "#ffffff",
                "surface-container": "#f0edec",
                "primary-container": "#0f6ef0",
                "surface-variant": "#e5e2e1",
                "tertiary-fixed": "#e0e3e6"
            },
            "borderRadius": {
                "DEFAULT": "0.25rem",
                "lg": "0.5rem",
                "xl": "0.75rem",
                "full": "9999px"
            },
            "spacing": {
                "stack-lg": "64px",
                "stack-md": "32px",
                "stack-sm": "16px",
                "gutter": "24px",
                "container-max": "1200px",
                "unit": "8px",
                "margin-mobile": "20px"
            },
            "fontFamily": {
                "headline-lg-mobile": ["Manrope"],
                "headline-lg": ["Manrope"],
                "body-md": ["Inter"],
                "display": ["Manrope"],
                "label-sm": ["Inter"],
                "body-lg": ["Inter"]
            },
            "fontSize": {
                "headline-lg-mobile": ["32px", { "lineHeight": "40px", "letterSpacing": "-0.02em", "fontWeight": "600" }],
                "headline-lg": ["48px", { "lineHeight": "56px", "letterSpacing": "-0.02em", "fontWeight": "600" }],
                "body-md": ["16px", { "lineHeight": "24px", "letterSpacing": "0", "fontWeight": "400" }],
                "display": ["120px", { "lineHeight": "120px", "letterSpacing": "-0.04em", "fontWeight": "700" }],
                "label-sm": ["14px", { "lineHeight": "20px", "letterSpacing": "0.02em", "fontWeight": "500" }],
                "body-lg": ["18px", { "lineHeight": "28px", "letterSpacing": "0", "fontWeight": "400" }]
            }
        }
    }
};

document.addEventListener('DOMContentLoaded', () => {
    const btnBack = document.getElementById('btn-back');
    if (btnBack) {
        btnBack.addEventListener('click', () => {
            window.history.back();
        });
    }
});
