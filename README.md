# blackshore.com Wordpress theme

The theme is based on _Gridcraft WP theme version 1.2.0_.

## How to deploy?

The corporate Wordpress install is setup with a plugin called "WP Pusher". A Github webhook is
configured to notify the Wordpress install whenever we push to the `master` branch. There should
be no other deployment step than pushing to this Github repository. In case that fails, it is
possible to update the theme manually using the Wordpress dashboard "WP Pusher" section.

## How to work on the theme locally?

WARNING: This is still a draft

1. Create yourself a Vagrant virtual machine using [Vagrantpress](http://vagrantpress.org)
1. Once loaded, go to the Wordpress admin (http://wordpress.dev/wp-admin/)
1. Install the Gridcraft theme (using gridcraft.zip in this repository) 
1. Clone this repository in `$WORDPRESS_HOME$/wp-content/themes/gridcraft-child`
1. Install plugins (see below)
1. Import data from production website and start hacking away like there's no tomorrow
 
## Required plugins

 - WP Pusher (must be downloaded from https://wppusher.com/download and installed manually)
 - Inherit Featured Image
 
## Random notes 

### Adding icons to main menu items

The `style.css` file contains a section where specific CSS classes are configured for the main menu (look for `.menu-item`).
To add icons to menu items, the proper class must first be added to the CSS file. Then you go to
`Appearance > Menus` and edit the CSS class for the menu item to which you want to add an icon.
 
### 'Talent' custom post type

A new post type is bundled with the team and allows easy creation of new Talent pages. It is mandatory to fill up
the custom fields (website URL, label and avatar) when editing the Talent form.

To add a **spotlight** banner on top of the page, the tag `spotlight` has to be added to the Talent item.

### Contact form styling

To correctly style the contact form, the `submit` field should have it's element ID set to `contact-submit`, as such:

```
   <p>[submit id:contact-submit "Send"]</p>
```
