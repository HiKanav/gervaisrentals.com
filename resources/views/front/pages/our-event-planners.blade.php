@extends('front.layout.rsb')

@section('title')Our Event Planners @stop
@section('css')
<style>
	.table>thead>tr>td{
		padding: 7px !important;
	}
</style>
@stop
@section('left-content')
    <h2>Event Planners</h2>
    <table class="table table-responsive table-striped table-bordered">
    	<thead>
    		<tr class="info">
    			<h6><td class="lead">Fullname</td></h6>
    			<h6><td class="lead">Email 1</td></h6>
    			<h6><td class="lead">Email 2</td></h6>
    			<h6><td class="lead">Contact at Gervais</td></h6>
    		</tr>
    	</thead>	
		<tbody>
		    <tr>
		        <td>BENAIM GLORIA</td>
		        <td><a href="mailto:gloria@gloriabenaimevents.com" class="text-lowercase">gloria@gloriabenaimevents.com</a></td>
		        <td></td>
		        <td>GEORGE</td>
		    </tr>
		    <tr>
		        <td>Candace & Co Events</td>
		        <td><a href="mailto:candace@candaceco.com" class="text-lowercase">candace@candaceco.com</a></td>
		        <td></td>
		        <td>GEORGE</td>
		    </tr>
		    <tr>
		        <td>CARMEN TAN EVENTS</td>
		        <td><a href="mailto:hello@carmentanevents.com" class="text-lowercase">hello@carmentanevents.com</a></td>
		        <td></td>
		        <td>HARRISON</td>
		    </tr>
		    <tr>
		        <td>CHERRY AND BAKER ASSOCIATES</td>
		        <td><a href="mailto:sarahcherry@rogers.com" class="text-lowercase">sarahcherry@rogers.com</a></td>
				<td></td>
		        <td>GEORGE</td>
		    </tr>
		    <tr>
		        <td>FERN COHEN</td>
		        <td><a href="mailto:fern@ferncohenevents.com" class="text-lowercase">fern@ferncohenevents.com</a></td>
		        <td></td>
		        <td>GEORGE</td>
		    </tr>
		    <tr>
		        <td>ESTHER MARCUS EVENTS</td>
		        <td><a href="mailto:emarcusevents@live.com" class="text-lowercase">emarcusevents@live.com</a></td>
		        <td></td>
		        <td>GEORGE</td>
		    </tr>
		    <tr>
		        <td>Ideation EventsI</td>
		        <td><a href="mailto:e.garay@sympatico.ca" class="text-lowercase">e.garay@sympatico.ca</a></td>
		        <td></td>
		        <td>GEORGE</td>
		    </tr>
		    <tr>
		        <td>JOHANNA SHARPE</td>
		        <td><a href="mailto:info@johannaleigh.com" class="text-lowercase">info@johannaleigh.com</a></td>
		        <td></td>
		        <td>HARRISON</td>
		    </tr>
		    <tr>
		        <td>JUDY STEIN CONSULTING</td>
		        <td><a href="mailto:judystein@rogers.com" class="text-lowercase">judystein@rogers.com</a></td>
		        <td></td>
		        <td>GEORGE</td>
		    </tr>
		    <tr>
		        <td>KAREN JACOBS CONSULTING INC</td>
		        <td><a href="mailto:karenj@karenjacobsconsulting.com" class="text-lowercase">karenj@karenjacobsconsulting.com</a></td>
		        <td></td>
		        <td>HARRISON</td>
		    </tr>
			<tr>
		        <td>KARI LYWOOD EVENTS</td>
		        <td><a href="mailto:kari@karilywood.com" class="text-lowercase">kari@karilywood.com</a></td>
		        <td></td>
		        <td>GEORGE</td>
		    </tr>
		    <tr>
		        <td>LEXY MARIE WEDDINGS</td>
		        <td><a href="mailto:hello@lexymarie.com" class="text-lowercase">hello@lexymarie.com</a></td>
		        <td></td>
		        <td>HARRISON</td>
		    </tr>
			<tr>
		        <td>LISA COVANT EVENT PLANNER</td>
		        <td><a href="mailto:lisa@treasuredevents.ca " class="text-lowercase">lisa@treasuredevents.ca </a></td>
		        <td><a href="www.treasuredevents.ca " class="text-lowercase">www.treasuredevents.ca </a></td>
		        <td>HARRISON</td>
		    </tr>
	    	<tr>
		        <td>MAGEN BOY'S HIGH ENERGY </td>
		        <td><a href="mailto:jennifer@magenboys.com" class="text-lowercase">jennifer@magenboys.com</a></td>
		        <td><a href="mailto:janelle@magenboys.com" class="text-lowercase">janelle@magenboys.com</a></td>
		        <td>GEORGE</td>
		    </tr>
		    <tr>
		        <td>MCATEER TRACEY</td>
		        <td><a href="mailto:tracey@traceymcateerevents.com" class="text-lowercase">tracey@traceymcateerevents.com</a></td>
		        <td></td>
		        <td>HARRISON</td>
		    </tr>
		    {{-- <tr>
		        <td>PRINCESS WEDDINGS</td>
		        <td><a href="mailto:events@princesswedding.ca" class="text-lowercase">events@princesswedding.ca</a></td>
		        <td></td>
		        <td>HARRISON</td>
		    </tr> --}}
		    <tr>
		        <td>RACHEL WOLFSON, PARTY</td>
		        <td><a href="mailto:rachel@partyconcierge.ca" class="text-lowercase">rachel@partyconcierge.ca</a></td>
		        <td></td>
		        <td>GEORGE</td>
		    </tr>
		    <tr>
		        <td>RICKY BESSNER PARTY PLANNING</td>
		        <td><a href="mailto:ricky@partyplanning.ca" class="text-lowercase">ricky@partyplanning.ca</a></td>
		        <td></td>
		        <td>GEORGE</td>
		    </tr>
		    {{-- <tr>
		        <td>ROCKPAPER EVENTS</td>
		        <td><a href="mailto:rockpaperevents@gmail.com" class="text-lowercase">rockpaperevents@gmail.com</a></td>
		        <td><a href="mailto:heather@rockpaperevents.com" class="text-lowercase">heather@rockpaperevents.com</a></td>
		        <td>GEORGE</td>
		    </tr> --}}
		    <tr>
		        <td>TABLE OF CONTENTS</td>
		        <td><a href="mailto:eve@tableofcontents.ca" class="text-lowercase">eve@tableofcontents.ca</a></td>
		        <td></td>
		        <td>HARRISON</td>
		    </tr>
		    <tr>
		        <td>TAYLOR MADE EVENT CREATION</td>
		        <td><a href="mailto:info@taylormadeventcreation.com" class="text-lowercase">info@taylormadeventcreation.com</a></td>
		        <td><a href="https://www.taylormadeeventcreation.com/">https://www.taylormadeeventcreation.com/</a></td>
		        <td>HARRISON</td>
		    </tr>
		    {{-- <tr>
		        <td>VIB EVENT STAFFING</td>
		        <td><a href="mailto:valerie@vib.events" class="text-lowercase">valerie@vib.events</a></td>
		        <td><a href="mailto:magda@vib.events" class="text-lowercase">magda@vib.events</a></td>
		        <td>HARRISON</td>
		    </tr> --}}
		    {{-- <tr>
		        <td>ZB HOSPITALITY MANAGEMENT GROUP</td>
		        <td><a href="mailto:events@zbcaterers.com" class="text-lowercase">events@zbcaterers.com</a></td>
		        <td><a href="mailto:catering@Catertrendz.com" class="text-lowercase">catering@Catertrendz.com</a></td>
		        <td>HARRISON</td>
		    </tr> --}}
		</tbody>
    </table>
@stop