<div class="container justify-content-center mt-5 border-left border-right">
                                <ul class="list-group list-group-flush">                                    
                                    @if($comments)
                                        @foreach($comments as $c)
                                        <li class="list-group-item">
                                        <div class="justify-content-between py-1 pt-2">
                                                    <div><span class="text2 fw-bold fs-6">{{$c->name}}</span></div>                                                
                                                </div>
                                        <div class="justify-content py-2">
                                            <div class="second py-2 px-2"> <textarea  class="form-control bg-white" rows="5" readonly>{{$c->comment_comment}}</textarea>
                                            </div>
                                        </div>
                                        </li>
                                        @endforeach
                                        @if($comments->count() == 0) 
                                            <li class="list-group-item">
                                            <div class="d-flex justify-content py-2">
                                                <div class="second py-2 px-2"> <span > Theres No Comment yet</span>                                            
                                                </div>
                                            </div>
                                            </li>
                                        @endif
                                    @endif                                    
                                </ul>
                                </div>