<h3 class="my-4 text-center">Comments 📝</h3>
<form action="{{route('comments.store', $post)}}" method="POST">
  @csrf
  <div class="row pb-5">
    <div class="col-12 mt-3">
      <textarea class="form-control" placeholder="Text" name="text" rows="2" required></textarea>
    </div>
    <div class="col-6">
      <button type="submit" class="btn btn-success mt-3">Comment</button>
    </div>
  </div>
</form>
