 1. Setup the location for your new sub-theme.

    Copy the starterkit folder out of the zen/ folder and rename it to be your
    new sub-theme.

    IMPORTANT:
    - The name of your sub-theme must start with an
    alphabetic character and can only contain lowercase letters, numbers and
    underscores.
    - To make it easier to upgrade Prius, sub-themes should reside in a folder
    separate from the base theme.

    For example, copy the themes/custom/starterkit folder and rename it
    as themes/custom/mythemename.

 2. Setup the basic information for your sub-theme.

    In your new sub-theme folder, rename the starterkit.info.yml file to include
    the name of your new sub-theme. Then edit the .info.yml file by editing
    the name, description and tags properties.

    For example, rename the themes/custom/starterkit/starterkit.info.yml file to
    themes/custom/mythemename/mythemename.info.yml.

 3. Setup the config.rb file for Compass

    Edit the config.rb file by editing the http_path properties to reflect your
    theme internal path.
     the name, description and tags properties.

    For example, http_path should be:
    http_path = "/themes/custom/mythemename"

 4. Further extend your sub-theme.

    Discover further ways to extend your sub-theme by reading Drupal 7's Theme
    Guide online at:
      https://drupal.org/theme-guide
