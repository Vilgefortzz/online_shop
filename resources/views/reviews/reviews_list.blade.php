<div class="infinite-scroll">
    @foreach($reviews as $review)
        <div class="row">
            <div class="col-sm-8">
                <div class="panel panel-review panel-default">
                    <div class="panel-heading panel-heading-review">
                        <span class="glyphicon glyphicon-user"></span><span class="text-muted" style="margin-right: 10px"><u><b>{{$review->user->name}}</b></u></span>
                        <span class="glyphicon glyphicon-time"></span><span class="text-muted"><u><b>{{$review->created_at->toDateString()}}</b></u></span>
                    </div>
                    <div class="panel-body">
                        {{$review->review}}
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{ $reviews->links() }}

</div>