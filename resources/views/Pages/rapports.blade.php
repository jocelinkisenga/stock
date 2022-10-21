@extends('layouts.app')
@section('content')
<div class="main-panel" id="page">
    <div class="content-wrapper">
      <livewire:rapport.stockrapport>
  </div>
</div> 
<script>
  $('.input-daterange input').each(function() {
    $(this).datepicker('clearDates');
});
</script>
@endsection