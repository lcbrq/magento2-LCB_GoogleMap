# Add Google Map to any place of your Magento 2 store

## Usage

Declare:

`<block class="LCB\GoogleMap\Block\Render" name="map" as="map" template="map.phtml"/>`

in your layout xml  

and `<?php echo $this->getChildHtml('map'); ?>`  

in your template file.

Example for contact_index_index.xml

```xml
<referenceContainer name="content" htmlClass="row contact-page" htmlTag="div">
    <block class="Magento\Contact\Block\ContactForm" name="contactForm" template="Magento_Contact::form.phtml">
        <block class="LCB\GoogleMap\Block\Render" name="map" as="map" template="map.phtml"/>
    </block>
</referenceContainer>
```

## Configuration

![Magento2 Google Maps configuration](media/configuration.png?raw=true)  

You can as well use following syntax on any page:

```html
<div id="map"></div>
<script type="text/javascript">// <![CDATA[
    var apiKey = '<GOOGLE_MAPS_API_KEY>';
    require([
        'LCB_GoogleMap/js/map'
    ], function (map) {
        map.render(
                document.getElementById('map'),
                latitude,
                longitude,
                zoom
                );
    });
    // ]]>
</script>
```

## Known issues

Lack of map width and height. Add:

```css
#map {
    min-width: 640px;
    min-height: 320px;
}
```

to your stylesheet.