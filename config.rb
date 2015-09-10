#require "susy";

http_path = "/"
css_dir = "public/assets/css"
sass_dir = "public/src/sass"
images_dir = "public/assets/images"
javascripts_dir = "public/assets/js"
output_style = :compressed #or :expanded or :nested or :compact or :compressed

# To disable debugging comments that display the original location of your selectors. Uncomment:
line_comments = false
relative_assets = true
sourcemap = true


# If you prefer the indented syntax, you might want to regenerate this
# project again passing --syntax sass, or you can uncomment this:
# preferred_syntax = :sass
# and then run:
# sass-convert -R --from scss --to sass sass scss && rm -rf sass && mv scss sass