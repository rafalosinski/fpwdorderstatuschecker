#!/bin/sh

if [[ -d "/Users/rafalosinski/Sites/releases/fpwdorderstatuschecker" ]]
then
    rm -r /Users/rafalosinski/Sites/releases/fpwdorderstatuschecker
    mkdir /Users/rafalosinski/Sites/releases/fpwdorderstatuschecker
else
    mkdir /Users/rafalosinski/Sites/releases/fpwdorderstatuschecker
fi

gulp

cd ~/Sites/releases/fpwdorderstatuschecker/

rm ~/Sites/releases/fpwdorderstatuschecker/build.sh
rm ~/Sites/releases/fpwdorderstatuschecker/generate-pot.sh
rm -r ~/Sites/releases/fpwdorderstatuschecker/node_modules/
# timber
rm -r ~/Sites/releases/fpwdorderstatuschecker/vendor/timber/.github
rm -r ~/Sites/releases/fpwdorderstatuschecker/vendor/timber/docs
rm -r ~/Sites/releases/fpwdorderstatuschecker/vendor/timber/tests

# twig
rm -r ~/Sites/releases/fpwdorderstatuschecker/vendor/timber/doc
rm -r ~/Sites/releases/fpwdorderstatuschecker/vendor/timber/test

# directories
find . -name ".git" -delete
# files
find . -name ".gitignore" -type f -delete
find . -name "gulpfile.js" -type f -delete
find . -name "*.lock" -type f -delete
find . -name "package.json" -type f -delete
find . -name "gulpfile.js" -type f -delete
find . -name "composer.json" -type f -delete
find . -name "*.map" -type f -delete
find . -name "karma.conf.js" -type f -delete
find . -name "bower.json" -type f -delete
find . -name "*.scss" -type f -delete
find . -name "*.html" -type f -delete
find . -name ".eslintrc" -type f -delete
find . -name ".gitignore" -type f -delete
find . -name ".travis.yml" -type f -delete
find . -name "gulpfile.babel.js" -type f -delete
find . -name "rollup.config.js" -type f -delete
find . -name "UPGRADE-2.0.md" -type f -delete
find . -name "UPGRADE-2.1.md" -type f -delete
find . -name "UPGRADE-2.2.md" -type f -delete
find . -name ".DS_Store" -type f -delete
find . -name "yarn.lock" -type f -delete
find . -name "yarn-error.log" -type f -delete

find . -type d -empty -delete

cd ~/Sites/releases
zip -r fpwdorderstatuschecker.zip fpwdorderstatuschecker
