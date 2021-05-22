var Hyphenopoly = {
    require: {
        "de": "FORCEHYPHENOPOLY",
        "fr": "FORCEHYPHENOPOLY",
        "it": "FORCEHYPHENOPOLY",
    },
    setup: {
        dontHyphenateClass: "nohyphen",
        exceptions: {
            "global": "climatique, sachet"
        },
        selectors: {
            "#main-content": {},
            "#menu-overlay": {},
        }
    }
};