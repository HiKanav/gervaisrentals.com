<?php

Html::macro('catalog', function($description, $collection, $imgLocation, $options, $class='col-md-4 col-sm-4 col-xs-6')
{
	
	$options += ['is_href_img' => true, 'href' => 'image_location', 'src' => 'thumbnail_location', 'title' => 'description', 'limit' => '130', 'arrows' => false];
	extract($options);

	$rentalTitle = asset("default/front/imgs/rental-title.jpg");
	$arrowLeft = asset("default/front/imgs/arrow-left.png");
	$arrowRight = asset("default/front/imgs/arrow-right.png");

	$html =  <<<EOT
	    <div class="col-md-12 catalogue-2">
	        <div class="col-xs-8 col-md-8 col-sm-6 rent-img rent-2 rent-col">
	            <h3>$description</h3>
	            <a href="#"><img src="$rentalTitle" alt=""></a>
	        </div>
EOT;
	    
	if($arrows):
		$html .=  <<<EOT
		        <div class="col-xs-4 col-sm-4 col-md-4 pull-right arrow-top rent-top">
		            <div class="arrow arrow-rent"> <a class="arrow-left" href="javascript:"><img src=$arrowLeft alt=""></a> <span>2</span> <a class="arrow-right" href="javascript:"><img src=$arrowRight alt=""></a> </div>
		        </div>
EOT;
	endif;
	    
	$html .= '</div>';

	$html .= '<div class="row rentel-cal about-col"><div class="col-md-12"><div class="product">';

	foreach($collection as $object):
		$href = $is_href_img ? asset($imgLocation.'/'.$object[$options['href']]) : action('Front\PageController@getCategoryProducts', [$object->route_name]);

		$src = asset($imgLocation.'/'.$object[$options['src']]);

 		$text = str_limit($object[$title], $limit, '...');
 		
		$html .= <<<EOT
	        <div class="$class rent party">
	        	<div class="col-in-row">
EOT;

		$html .= $is_href_img? "<a rel='fancybox' data-gallery='multiimages' data-toggle='lightbox' href=$href><img alt= '' src='$src'></a>" : "<a href=$href><img alt='' src='$src'></a>";


		$html .= <<<EOT
	        	</div>
	            <div class="catalogue-text">
	                <p class="text-center">$text</p>
	            </div>
	        </div>
EOT;
	endforeach;

	if(isset($category_id) && $category_id === 22):
		$url = action('Front\PageController@getTentEnquiry');
		//$html .= "<a href={$url}>Tent Inquiry Form</a>";
		$html .= '
			<div class="col-md-2 col-sm-4 col-xs-6 rent party">
				<div class="col-in-row"><a href='.$url.'><img src='.asset("imgs/tent-enquiry.jpg").' alt="Tent Enquiry"></a>
				</div>
			    <div class="catalogue-text">
			        <p class="text-center"><a href='.$url.'>Tent Inquiry Form</a></p>
			    </div>
			</div>';
	endif;
	if(isset($category_id) && $category_id === 23):
		$url = action('Front\PageController@getPackageRequest');
		$email = 'mailto:sales@gervaisrentals.com?subject=Custom Package Request';
		$html .= '
			<div class="col-md-2 col-sm-4 col-xs-6 rent party">
				<div class="col-in-row custom-bg"><a href="'.$url.'">Custom Package Available</a>
				</div>
				<div class="catalogue-text">
			        <p class="text-center"><a style="color: #777;" href='.$url.'>Custom Package Request</a></p>
			    </div>
			</div>';
	endif;

	if(isset($category_id) && $category_id === 9):
		$url = action('Front\PageController@getTentEnquiry');
		//$html .= "<a href={$url}>Tent Inquiry Form</a>";
		$html .= '
			<div class="col-md-2 col-sm-4 col-xs-6 rent party">
				<div class="col-in-row"><a href="https://www.youtube.com/watch?v=DZ1ILkrdPBQ"><img src="https://cdn0.iconfinder.com/data/icons/tuts/256/youtube.png" alt="Youtube"></a>
				</div>
			    <div class="catalogue-text">
			        <p class="text-center"><a href="https://www.youtube.com/watch?v=DZ1ILkrdPBQ">Lighting Our Propane BBQ’s</a></p>
			    </div>
			</div>';
	endif;

	$html .= '</div></div></div>';

	echo $html;
});