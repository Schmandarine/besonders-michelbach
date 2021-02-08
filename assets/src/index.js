import { siteNavigationComponent } from './js/site-navigation';
import { mapLeafletComponent } from './js/map-leaflet';
import { jqueryCustomScripts } from './js/jquery-scripts';
import { slickSliderScript } from './js/slick-slider-script';
import { accordionComponent } from './js/accordeon';
import { version } from 'webpack';

siteNavigationComponent();
mapLeafletComponent();

jqueryCustomScripts();
slickSliderScript();
accordionComponent();
