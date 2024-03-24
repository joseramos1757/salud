@props(['modalTitle'=>'','modalId'=>'','modalSize'])
<!-- Modal -->
<div wire:ignore.self class=" text-white modal fade" id="{{$modalId}}" tabindex="-1" aria-labelledby="exampleModalLabel" 
      aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" >
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header bg-blue-700">
          <h4 class="modal-title " id="exampleModalLabel">{{$modalTitle}}</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          {{$slot}}
        </div>
        {{--<div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>--}}
      </div>
    </div>
</div>