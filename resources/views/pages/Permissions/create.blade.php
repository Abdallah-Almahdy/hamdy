@extends('admin.app')



@section('content')
    <livewire:create-section/>
@endsection

@section('scripts')
<script>
    let sectionType = document.getElementById('sectionType')
    let sectionDiv = document.getElementById('sectionDiv')


    sectionType.addEventListener('change', function() {
           console.log(this.value);
            if(this.value == 'sub'){
                sectionDiv.classList.remove('invisible')
            }else{
                sectionDiv.classList.add('invisible')
            }
        })


</script>
@endsection
