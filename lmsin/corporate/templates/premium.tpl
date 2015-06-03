{extends file="index.tpl"}

{block name=body}
    <style>
   
.tile {
  width: 100%;
  display: inline-block;
  box-sizing: border-box;
  background: #fff;
  padding: 40px;
  margin-bottom: 30px;
}
.tile .title {
  margin-top: 0px;
}
.tile.purple, .tile.blue, .tile.red, .tile.orange, .tile.green {
  color: #fff;
}
.tile.purple {
  background: #5133AB;
}
.tile.purple:hover {
  background: #3e2784;
}
.tile.red {
  background: #AC193D;
}
.tile.red:hover {
  background: #7f132d;
}
.tile.green {
  background: #00A600;
}
.tile.green:hover {
  background: #007300;
}
.tile.blue {
  background: #2672EC;
}
.tile.blue:hover {
  background: #125acd;
}
.tile.orange {
  background: #DC572E;
}
.tile.orange:hover {
  background: #b8431f;
}

</style>
    <div class="container">
  <div class="row">
    <div class="col-md-10">
      <h1><strong>Premium Feature - U gotta pay more!!</strong></h1>
    </div>
  </div><br><br>
  <div class="row">
    <div class="col-sm-6"><a href="./advanced_video_search.php">
      <div class="tile purple">
        <h3 class="title">Analyze By Video</h3>
        <p>Hello Purple, this is a colored tile.</p>
        </div></a>
    </div>
    <div class="col-sm-4"><a href="./advanced_parameter_search.php">
      <div class="tile red">
        <h3 class="title">Analyze By Parameters</h3>
        <p>Hello Red, this is a colored tile.</p>
      </div></a>
    </div>
  </div><br><br>
    <div class="row">
    <div class="col-sm-4"><a href="./compare.php">
      <div class="tile orange">
        <h3 class="title">Compare</h3>
        <p>Hello Orange, this is a colored tile.</p>
      </div></a>
    </div>
  
    <div class="col-sm-6"><a href="./analysis.php?act=video_section">
      <div class="tile blue">
        <h3 class="title">Slice and Analyze</h3>
        <p>Hello Green, this is a colored tile.</p>
      </div></a>
    </div></div>
    
</div>
{/block}