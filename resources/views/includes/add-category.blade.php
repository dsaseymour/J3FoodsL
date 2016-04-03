<div class="modal-dialog modal-lg">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
      <form method="POST" role="form" action="{{ route('addcategory') }}">
        {!! csrf_field() !!}
        <div class="list-group"
          <label class="list-group-item-heading">Category</label>
          <input type="text" class="form-control" name="category" >
        </div>

      </div>
      <div class="modal-footer">
       <button type='submit' class="btn btn-primary"/>Add</button>
    </form>
  </div>
</div>
</div>
