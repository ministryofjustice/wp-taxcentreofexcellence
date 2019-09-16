const mix = require('laravel-mix');

mix.setPublicPath('./dist/');

mix.js('assets/scripts/main.js', 'scripts/main.js')
  .sass('assets/styles/main.scss', 'styles/main.css')
  .options({
    processCssUrls: false
  })
  .sass('assets/styles/editor.scss', 'styles/editor.css')
  .copy('assets/fonts/*', 'dist/fonts/')
  .copy('./node_modules/govuk-frontend/govuk/assets/fonts/*', 'assets/fonts/')
  .copy('assets/images/*.{jpg,jpeg,png,gif,svg,ico}', 'dist/images/')
  .copy('assets/images/external-links/*.{jpg,jpeg,png,gif,svg,ico}', 'dist/images/external-links/');

if (mix.inProduction()) {
  mix.version();
} else {
  mix.sourceMaps();
}
