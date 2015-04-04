# This sets the required gems and versions, if the right version is not installed
# compass with throw an error, hopefully. A bundle Gemfile is included so you can run
# bundle install.
require 'compass/import-once/activate'
require "susy"
require "breakpoint"

# Set this to the root of your project when deployed:
http_path = "/"
css_dir = "css"
sass_dir = "sass"
fonts_dir = "fonts"
images_dir = "images"
javascripts_dir = "js"
http_path = "/themes/prius"

# You can select your preferred output style here (can be overridden via the command line):
# output_style = :expanded or :nested or :compact or :compressed
output_style = :expanded

# To enable relative paths to assets via compass helper functions. Uncomment:
# relative_assets = true

# To disable debugging comments that display the original location of your selectors. Uncomment:
# line_comments = false

# If you prefer the indented syntax, you might want to regenerate this
# project again passing --syntax sass, or you can uncomment this:
# preferred_syntax = :sass
# and then run:
# sass-convert -R --from scss --to sass sass scss && rm -rf sass && mv scss sass