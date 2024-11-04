@extends('front.layout.rsb')

@section('title')What size tent do i need? @stop

@section('left-content')
    <h2>What size tent do i need ?</h2>
    <p>Gervais Party And Tent Rentals Ltd - Scarborough</p>
    <p><a href="{{asset($tentSizeLocation.'/'.'Gervais-Tent-Sizing.pdf')}}">Download</a> the pdf version of this sheet</p>
    <table class="table table-responsive">
    	<thead>
    		<tr class="info">
    			<th colspan="4" class="text-center lead">Click on the links below to see a PDF drawing of each tent size.</th>
    		</tr>
    	</thead>
		<tbody>
			<tr>
				<td><a target="_blank" href="{{asset($tentSizeLocation.'/'.'15X15.pdf')}}">15 X 15</a></td>
				<td><a target="_blank" href="{{asset($tentSizeLocation.'/'.'20X20.pdf')}}">20 X 20</a></td>
				<td><a target="_blank" href="{{asset($tentSizeLocation.'/'.'20X30.pdf')}}">20 X 30</a></td>
				<td><a target="_blank" href="{{asset($tentSizeLocation.'/'.'20X40.pdf')}}">20 X 40</a></td>
			</tr>
			<tr>
				<td><a target="_blank" href="{{asset($tentSizeLocation.'/'.'30X30.pdf')}}">30 X 30</a></td>
				<td><a target="_blank" href="{{asset($tentSizeLocation.'/'.'30X45.pdf')}}">30 X 45</a></td>
				<td><a target="_blank" href="{{asset($tentSizeLocation.'/'.'30X60.pdf')}}">30 X 60</a></td>
				<td><a target="_blank" href="{{asset($tentSizeLocation.'/'.'30X75.pdf')}}">30 X 75</a></td>
			</tr>
			<tr>
				<td><a target="_blank" href="{{asset($tentSizeLocation.'/'.'30X90.pdf')}}">30 X 90</a></td>
				<td><a target="_blank" href="{{asset($tentSizeLocation.'/'.'40X40.pdf')}}">40 X 40</a></td>
				<td><a target="_blank" href="{{asset($tentSizeLocation.'/'.'40X60.pdf')}}">40 X 60</a></td>
				<td><a target="_blank" href="{{asset($tentSizeLocation.'/'.'40X80.pdf')}}">40 X 80</a></td>
			</tr>
			<tr>
				<td><a target="_blank" href="{{asset($tentSizeLocation.'/'.'40X100.pdf')}}">40 X 100</a></td>
				<td><a target="_blank" href="{{asset($tentSizeLocation.'/'.'50X50.pdf')}}">50 X 50</a></td>
				<td><a target="_blank" href="{{asset($tentSizeLocation.'/'.'50X70.pdf')}}">50 X 70</a></td>
				<td><a target="_blank" href="{{asset($tentSizeLocation.'/'.'50X90.pdf')}}">50 X 90</a></td>
			</tr>
			<tr>
				<td><a target="_blank" href="{{asset($tentSizeLocation.'/'.'60X60.pdf')}}">60 X 60</a></td>
				<td><a target="_blank" href="{{asset($tentSizeLocation.'/'.'60X90.pdf')}}">60 X 90</a></td>
				<td>&nbsp;
				</td>
				<td>&nbsp;
				</td>
			</tr>
		</tbody>
    </table>

    <table class="table table-responsive">
    	<thead>
    		<tr class="info">
    			<th colspan="3" class="text-center lead">Tent Sizing Worksheet</th>
    		</tr>
    	</thead>
		<tbody>
			<tr>
				<td># OF PEOPLE SEATED-ROUND TABLES&nbsp; ___&nbsp; X 10 SQ.FT./PERSON</td>
				<td>=</td>
				<td>&nbsp; __SQ. FT.</td>
			</tr>
			<tr>
				<td># OF PEOPLE SEATED-BANQUET TABLES ___ X 10 SQ.FT./PERSON</td>
				<td>=</td>
				<td>&nbsp; __SQ. FT.</td>
			</tr>
			<tr>
				<td># OF PEOPLE STANDING-NO TABLES&nbsp; ___&nbsp; X 6 SQ. FT./PERSON</td>
				<td>=</td>
				<td>&nbsp;__SQ. FT.</td>
			</tr>
			<tr>
				<td># OF PEOPLE STANDING-SOME SM. TABLES ___ X 8 SQ.FT./PERSON</td>
				<td>=</td>
				<td>&nbsp;__SQ. FT.</td>
			</tr>
			<tr>
				<td># OF PEOPLE HEAD TABLE ___ X 20 SQ. FT./PERSON</td>
				<td>=</td>
				<td>&nbsp;__SQ. FT.</td>
			</tr>
			<tr>
				<td># OF BUFFET TABLES ___ X 100 SQ. FT./TABLE</td>
				<td>=</td>
				<td>&nbsp;__SQ. FT.</td>
			</tr>
			<tr>
				<td># OF 33" ROUND CAKE TABLES ___ X 50 SQ. FT./TABLE</td>
				<td>=</td>
				<td>&nbsp;__SQ. FT.</td>
			</tr>
			<tr>
				<td># OF 48" ROUND CAKE TABLES ____ X 75 SQ. FT./ TABLE</td>
				<td>=</td>
				<td>&nbsp;__SQ. FT.</td>
			</tr>
			<tr>
				<td># OF 4' ROUND BEVERAGE TABLES ____ X 50 SQ. FT./TABLE</td>
				<td>=</td>
				<td>&nbsp;__SQ. FT.</td>
			</tr>
			<tr>
				<td># OF 5' ROUND BEVERAGE TABLES ____ X 75 SQ. FT./TABLE</td>
				<td>=</td>
				<td>&nbsp;__SQ. FT.</td>
			</tr>
			<tr>
				<td># OF GIFT TABLES ___ X 100 SQ. FT./TABLE</td>
				<td>=</td>
				<td>&nbsp;__SQ. FT.</td>
			</tr>
			<tr>
				<td># OF GUEST BOOK TABLE ___ X 50 SQ. FT./TABLE</td>
				<td>=</td>
				<td>&nbsp;__SQ. FT.</td>
			</tr>
			<tr>
				<td>DESCRIPTION</td>
				<td>=</td>
				<td>&nbsp;__SQ. FT.</td>
			</tr>
			<tr>
				<td># OF "OTHER" TABLES ____ X ___ SQ. FT./TABLE</td>
				<td>=</td>
				<td>&nbsp;__SQ. FT.</td>
			</tr>
			<tr>
				<td>____ X ___ SQ. FT./TABLE</td>
				<td>=</td>
				<td>&nbsp;__SQ. FT.</td>
			</tr>
			<tr>
				<td>____ X ___ SQ. FT./TABLE</td>
				<td>=</td>
				<td>&nbsp;__SQ. FT.</td>
			</tr>
			<tr>
				<td># OF BARS ____ X 150 SQ. FT./BAR &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (ACCOMODATES 140 PEOPLE W/2 BARTENDERS)</td>
				<td>=</td>
				<td>&nbsp;__SQ. FT.</td>
			</tr>
			<tr>
				<td>DISC JOCKEY AREA? 100 SQ. FT. NEEDED&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>=</td>
				<td>&nbsp;__SQ. FT.</td>
			</tr>
			<tr>
				<td># OF BAND MEMBERS ____ X30 OR 40 SQ. FT./MEMBER (CIRCLE ONE)</td>
				<td>=</td>
				<td>&nbsp;__SQ. FT.</td>
			</tr>
			<tr>
				<td># OF PEOPLE ON DANCE FLOOR ___ X 3 OR 4 SQ. FT./PERSON &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (BASED ON 65% OF TOTAL PEOPLE AT EVENT)</td>
				<td>=</td>
				<td>&nbsp;__SQ. FT.</td>
			</tr>
			<tr>
				<td>OTHER: _____________________________________</td>
				<td>=</td>
				<td>&nbsp;__SQ. FT.</td>
			</tr>
			<tr>
				<td>OTHER: _____________________________________</td>
				<td>=</td>
				<td>&nbsp;__SQ. FT.</td>
			</tr>
			<tr>
				<td>SUB-TOTAL</td>
				<td>=</td>
				<td>&nbsp;__SQ. FT.</td>
			</tr>
			<tr>
				<td>TOTAL SPACE REQUIRED --------------------------------</td>
				<td>=</td>
				<td>&nbsp;__SQ. FT.</td>
			</tr>
			<tr class="info">
    			<th colspan="3" class="text-center lead">(SUBTRACT ADJACENT STRUCTURES SQ. FT., IF USING FOR ANY OF THE ABOVE)</th>
    		</tr>
		</tbody>
    </table>
@stop