#!/bin/sh

xgettext --language=PHP --from-code=utf-8 -k_e -k_x -k__ -o languages/fpwd.pot  $(find . -name "*.php")
xgettext --language=PHP --from-code=utf-8 -k_e -k_x -k__ -o languages/fpwd-twig.pot $(find . -name "*.twig")
