export function switchTheme(theme) {
    if(theme === "system"){
            const isOsDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            switchTheme(isOsDark ? "stars" : "sage");
    }
    document.querySelector('html').dataset.theme = `theme-${theme}`;
    return true;
}