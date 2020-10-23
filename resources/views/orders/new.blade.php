@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
<form>
<div class="form-group">
<h1 class="">Order</h1>
</div>
<div class="form-group">
<label for="exampleFormControlInput1">Email address</label>
<input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
</div>
<div class="form-group">
<label for="from">Send</label>
<select class="form-control" id="from" onchange="distinct()">
@foreach ($currency as $currency1)
    <option value="{{ $currency1->from }}">{{ $currency1->from }}</option>
@endforeach
</select>

<div class="form-group">
<input type="text" class="form-control" id="ammount" name="lname" value="0" oninput="calcul()">
</div>
<div class="form-group">
<label for="exampleFormControlSelect1">Receive</label>
<select class="form-control" id="to">
@foreach ($currency as $currency1)
    <option value="{{ $currency1->from }}" id="{{ $currency1->from }}">{{ $currency1->from }}</option>
@endforeach
</select>
</select>
<div class="form-group">
<input type="text" class="form-control" id="price" name="lname" value="0">
</div>
</div>
<button type="button" id="ce_exbtn" onclick="ce_exchange('#CE_ExForm');" class="btn btn-primary btn-lg"><i class="fa fa-refresh"></i> Exchange</button>
</form>
</div>


<script type="text/javascript">
	function distinct()
	{

		var from = document.getElementById("from").value;
		currency = {!! json_encode($currency) !!};
		for (i = 0; i < currency.length; i++) {
			if(currency[i]["from"] !== from)
				{document.getElementById(from).disabled = false;
				alert("working");
			}
			else
				{document.getElementById(from).disabled = true;}
		}

	}

	function calcul()
	{
		currency = {!! json_encode($currency) !!};
		var from = document.getElementById("from").value;
		var to = document.getElementById("to").value;
		var rate = 0;
			if (from !== to)
			{
				var i;
				for (i = 0; i < currency.length; i++) {
					if ( from == currency[i]["from"])
					{
						if (to == currency[i]["to"])
						{
							rate = currency[i]["rate"];
							document.getElementById("price").value = document.getElementById("ammount").value * rate;
						}
					}
				}

				//alert('rate = '+rate);

			}

	}

</script>
@endsection
