{extends file="index.tpl"}

{block name=body}
    <style>
   
.tile {
  border-radius:15px;
  width: 100%;
  height: 180px;
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
  background: #388E8E;
}
.tile.blue:hover {
  background: #2a6969;
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
      <h1><strong>Premium Features</strong></h1>
    </div>
  </div><br><br>
  <div class="row">
    <div class="col-sm-6"><a href="./advanced_video_search.php">
      <div class="tile purple">
        <h3 class="title">Analyze By Video</h3>
        <p>See how your video was rated by a certain section of people, for example all males from United States.</p>
        </div></a>
    </div>
    <div class="col-sm-4"><a href="./advanced_parameter_search.php">
      <div class="tile red">
        <h3 class="title">Analyze By Parameters</h3>
        <p>See how all your videos were rated by people.</p>
      </div></a>
    </div>
  </div>
    <div class="row">
    <div class="col-sm-4"><a href="./compare.php">
      <div class="tile orange">
        <h3 class="title">Compare</h3>
        <p>Compare your video with other videos and see where it stands in its category.</p>
      </div></a>
    </div>
  
    <div class="col-sm-6"><a href="./analysis.php?act=video_section">
      <div class="tile blue">
        <h3 class="title">Slice and Analyze</h3>
        <p>Get to know which parts of your video were well received and which were not.</p>
      </div></a>
    </div></div>
    
</div>
{/block}