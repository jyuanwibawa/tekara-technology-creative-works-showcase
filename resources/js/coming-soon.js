/**
 * Coming Soon Page Script & Tailwind Configuration
 */
tailwind.config = {
    darkMode: "class",
    theme: {
        extend: {
            "colors": {
                "on-error-container": "#93000a",
                "secondary-fixed-dim": "#c5c7c8",
                "tertiary-fixed": "#e0e3e6",
                "error-container": "#ffdad6",
                "surface": "#fcf9f8",
                "inverse-primary": "#afc6ff",
                "tertiary-fixed-dim": "#c4c7ca",
                "on-tertiary-fixed": "#181c1e",
                "on-primary": "#ffffff",
                "on-error": "#ffffff",
                "surface-container-lowest": "#ffffff",
                "surface-container-high": "#ebe7e7",
                "on-tertiary-container": "#fbfdff",
                "outline": "#727786",
                "on-secondary-fixed-variant": "#454748",
                "outline-variant": "#c2c6d7",
                "background": "#fcf9f8",
                "primary-fixed": "#d9e2ff",
                "secondary-fixed": "#e1e3e4",
                "on-surface-variant": "#424754",
                "surface-variant": "#e5e2e1",
                "surface-bright": "#fcf9f8",
                "inverse-surface": "#313030",
                "on-secondary-container": "#626566",
                "on-tertiary-fixed-variant": "#43474a",
                "on-primary-container": "#fefcff",
                "primary": "#0057c3",
                "surface-container": "#f0edec",
                "primary-fixed-dim": "#afc6ff",
                "on-background": "#1c1b1b",
                "inverse-on-surface": "#f3f0ef",
                "tertiary": "#585c5f",
                "on-tertiary": "#ffffff",
                "surface-dim": "#dcd9d9",
                "surface-container-low": "#f6f3f2",
                "secondary": "#5c5f60",
                "on-secondary": "#ffffff",
                "on-secondary-fixed": "#191c1d",
                "primary-container": "#0f6ef0",
                "on-surface": "#1c1b1b",
                "on-primary-fixed-variant": "#004299",
                "tertiary-container": "#717578",
                "surface-container-highest": "#e5e2e1",
                "error": "#ba1a1a",
                "secondary-container": "#e1e3e4",
                "surface-tint": "#0059c7",
                "on-primary-fixed": "#001944"
            },
            "borderRadius": {
                "DEFAULT": "0.25rem",
                "lg": "0.5rem",
                "xl": "0.75rem",
                "full": "9999px"
            },
            "spacing": {
                "stack-md": "32px",
                "margin-mobile": "20px",
                "container-max": "1200px",
                "unit": "8px",
                "stack-sm": "16px",
                "stack-lg": "64px",
                "gutter": "24px"
            },
            "fontFamily": {
                "body-md": ["Inter"],
                "headline-lg-mobile": ["Manrope"],
                "body-lg": ["Inter"],
                "label-sm": ["Inter"],
                "display": ["Manrope"],
                "headline-lg": ["Manrope"]
            },
            "fontSize": {
                "body-md": ["16px", { "lineHeight": "24px", "letterSpacing": "0", "fontWeight": "400" }],
                "headline-lg-mobile": ["32px", { "lineHeight": "40px", "letterSpacing": "-0.02em", "fontWeight": "600" }],
                "body-lg": ["18px", { "lineHeight": "28px", "letterSpacing": "0", "fontWeight": "400" }],
                "label-sm": ["14px", { "lineHeight": "20px", "letterSpacing": "0.02em", "fontWeight": "500" }],
                "display": ["120px", { "lineHeight": "120px", "letterSpacing": "-0.04em", "fontWeight": "700" }],
                "headline-lg": ["48px", { "lineHeight": "56px", "letterSpacing": "-0.02em", "fontWeight": "600" }]
            }
        }
    }
};
