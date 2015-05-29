 // emotion animations
smileysCountArray = JSON.parse(smileysCountArray); // parse the json string to json object
smileysCountArray_overall = JSON.parse(smileysCountArray_overall);
var 
    positiveValenceSum = 0,
    positiveValenceCount = 0,
    negativeValenceSum = 0,
    negativeValenceCount = 0,
    happyAverage = 0,
    sadAverage = 0,
    neutralAverage = 0,
    angryAverage = 0,
    surprisedAverage = 0,
    disgustedAverage = 0;

$(function () {
    /////////////////////////////////////current video analysis///////////////////////////////////////////////////
    var 
    positiveValence = 0,
    negativeValence = 0,
    posValencePercent = 0,
    negValencePercent = 0;
    
    posvalenceObjLength = Object.keys(smileysCountArray.posvalence).length; 
    if(posvalenceObjLength>0){
        var posvalenceObj = smileysCountArray.posvalence;
        $.each(posvalenceObj , function(keys, valence_value){
            positiveValence = Number(valence_value);
        });
    }
    negvalenceObjLength = Object.keys(smileysCountArray.negvalence).length; 
    if(negvalenceObjLength>0){
        var negvalenceObj = smileysCountArray.negvalence;
        $.each(negvalenceObj , function(keys, valence_value){
            negativeValence = Number(valence_value);
        });
    }
    
    posValencePercent = Number(positiveValence/100);
    negValencePercent = Number(negativeValence/100);    
       
   
    
    $('.motivation-happy').circleProgress({
            startAngle: -Math.PI / 4 * 2,
            value: posValencePercent,
            size: 130,
            thickness:20,
            fill: { color: '#84C556' }
    });

    // This smiley for showing negative valence   
    $('.motivation-sad').circleProgress({
            startAngle: -Math.PI / 4 * 2,
            value: negValencePercent,
            size: 130,
            thickness:20,
            fill: { color: '#F1592A' }
    });
    
    $('#pos-valence-percent').html('<b>Positive Valence : ' + Number(posValencePercent*100).toFixed(2) +' %</b>');
    $('#neg-valence-percent').html('<b>Negative Valence : ' + Number(negValencePercent*100).toFixed(2) +' %</b>');
   //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
   /////////////////////overall video analysis/////////////////////////////////////////////////////////////////////////////
   /////////////////////////////////////////////////////////////////////////////////////////////////
   
    var 
    positiveValence_overall = 0,
    negativeValence_overall = 0,
    posValencePercent_overall = 0,
    negValencePercent_overall = 0;
    
    posvalenceObjLength = Object.keys(smileysCountArray_overall.posvalence).length; 
    if(posvalenceObjLength>0){
        var posvalenceObj = smileysCountArray_overall.posvalence;
        $.each(posvalenceObj , function(keys, valence_value){
            positiveValence_overall = Number(valence_value);
        });
    }
    negvalenceObjLength = Object.keys(smileysCountArray_overall.negvalence).length; 
    if(negvalenceObjLength>0){
        var negvalenceObj = smileysCountArray_overall.negvalence;
        $.each(negvalenceObj , function(keys, valence_value){
            negativeValence_overall = Number(valence_value);
        });
    }
    
    posValencePercent_overall = Number(positiveValence_overall/100);
    negValencePercent_overall = Number(negativeValence_overall/100);    
       
   
    
    $('.motivation-happy-overall').circleProgress({
            startAngle: -Math.PI / 4 * 2,
            value: posValencePercent_overall,
            size: 130,
            thickness:20,
            fill: { color: '#84C556' }
    });

    // This smiley for showing negative valence   
    $('.motivation-sad-overall').circleProgress({
            startAngle: -Math.PI / 4 * 2,
            value: negValencePercent_overall,
            size: 130,
            thickness:20,
            fill: { color: '#F1592A' }
    });
    
    $('#pos-valence-percent-overall').html('<b>Positive Valence : ' + Number(posValencePercent_overall*100).toFixed(2) +' %</b>');
    $('#neg-valence-percent-overall').html('<b>Negative Valence : ' + Number(negValencePercent_overall*100).toFixed(2) +' %</b>');
   
    
    // ////////////////////engagement smileys section////////////////////////////////////
    ///////////////////current video engagement analysis//////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////
      var totalEngage = 0,
        posengagementPercent = 0,
        negengagementPercent = 0;
        
    posengageObjLength = Object.keys(smileysCountArray.posengagement).length; 
    if(posengageObjLength>0){
        var posengObj = smileysCountArray.posengagement;
        $.each(posengObj , function(keys, posengage_value){
            totalEngage = Number(posengage_value);
        });             
    }
    
    posengagementPercent = Number(totalEngage/100);
    
    negengageObjLength = Object.keys(smileysCountArray.negengagement).length; 
    if(negengageObjLength>0){
        var negengObj = smileysCountArray.negengagement;
        $.each(negengObj , function(keys, negengage_value){
            totalEngage = Number(negengage_value);
        });             
    }
    
    negengagementPercent = Number(totalEngage/100);
    
    //remainingPercent = Number(1 - engagementPercent);
 
    $('.attention-happy').circleProgress({
            startAngle: -Math.PI / 4 * 2,
            value: posengagementPercent,
            size: 130,
            thickness:20,
            fill: { color: '#303192' }
    });
    
    $('.attention-sad').circleProgress({
            startAngle: -Math.PI / 4 * 2,
            value: negengagementPercent,
            size: 130,
            thickness:20,
            fill: { color: '#1DABE2' }
    });
    
    $('#head-stillness-percent').html('<b>Engagement : ' + Number(posengagementPercent*100).toFixed(2) +' %</b>');
    $('#eye-stillness-percent').html('<b>Disengagement : ' + Number(negengagementPercent*100).toFixed(2) +' %</b>');
    
   //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
   //////////////////////////////overall video engagement analysis///////////////////////////////////
   ////////////////////////////////////////////////////////////////////////////////////
   
   var totalEngage_overall = 0,
        posengagementPercent_overall = 0,
        negengagementPercent_overall = 0;
        
    posengageObjLength = Object.keys(smileysCountArray_overall.posengagement).length; 
    if(posengageObjLength>0){
        var posengObj = smileysCountArray_overall.posengagement;
        $.each(posengObj , function(keys, posengage_value){
            totalEngage_overall = Number(posengage_value);
        });             
    }
    
    posengagementPercent_overall = Number(totalEngage_overall/100);
    
    negengageObjLength = Object.keys(smileysCountArray_overall.negengagement).length; 
    if(negengageObjLength>0){
        var negengObj = smileysCountArray_overall.negengagement;
        $.each(negengObj , function(keys, negengage_value){
            totalEngage_overall = Number(negengage_value);
        });             
    }
    
    negengagementPercent_overall = Number(totalEngage_overall/100);
    
    //remainingPercent = Number(1 - engagementPercent);
 
    $('.attention-happy-overall').circleProgress({
            startAngle: -Math.PI / 4 * 2,
            value: posengagementPercent_overall,
            size: 130,
            thickness:20,
            fill: { color: '#303192' }
    });
    
    $('.attention-sad-overall').circleProgress({
            startAngle: -Math.PI / 4 * 2,
            value: negengagementPercent_overall,
            size: 130,
            thickness:20,
            fill: { color: '#1DABE2' }
    });
    
    $('#head-stillness-percent-overall').html('<b>Engagement : ' + Number(posengagementPercent_overall*100).toFixed(2) +' %</b>');
    $('#eye-stillness-percent-overall').html('<b>Disengagement : ' + Number(negengagementPercent_overall*100).toFixed(2) +' %</b>');
  
    
    ////////////  // // Emotions smileys section///////////////////////////////////////////////////
    ////////////////////current video////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////
    var totalSum = 0,
        happySum = 0,
        sadSum = 0,
        neutralSum = 0,
        disgustedSum = 0,
        surprisedSum = 0,
        angrySum = 0,
        scaredSum=0;
        
    var happyObjLength = Object.keys(smileysCountArray.happy).length; 
    if(happyObjLength>0){
        var happyObj = smileysCountArray.happy;
        $.each(happyObj , function(keys, happy_value){
            happySum = Number(happySum) + Number(happy_value);
        });             
    }
    
    var sadObjLength = Object.keys(smileysCountArray.sad).length; 
    if(sadObjLength>0){
        var sadObj = smileysCountArray.sad;
        $.each(sadObj , function(keys, sad_value){
            sadSum = Number(sadSum) + Number(sad_value);
        });             
    }
    
    var neutralObjLength = Object.keys(smileysCountArray.neutral).length; 
    if(neutralObjLength>0){
        var neutralObj = smileysCountArray.neutral;
        $.each(neutralObj , function(keys, neutral_value){
            neutralSum = Number(neutralSum) + Number(neutral_value);
        });             
    }
    
    var angryObjLength = Object.keys(smileysCountArray.angry).length; 
    if(angryObjLength>0){
        var angryObj = smileysCountArray.angry;
        $.each(angryObj , function(keys, angry_value){
            angrySum = Number(angrySum) + Number(angry_value);
        });             
    }
    
    var disgustedObjLength = Object.keys(smileysCountArray.disgusted).length; 
    if(disgustedObjLength>0){
        var disgustedObj = smileysCountArray.disgusted;
        $.each(disgustedObj , function(keys, disgusted_value){
            disgustedSum = Number(disgustedSum) + Number(disgusted_value);
        });             
    }
    
    var surprisedObjLength = Object.keys(smileysCountArray.surprised).length; 
    if(surprisedObjLength>0){
        var surprisedObj = smileysCountArray.surprised;
        $.each(surprisedObj , function(keys, surprised_value){
            surprisedSum = Number(surprisedSum) + Number(surprised_value);
        });             
    }
    
    var scaredObjLength = Object.keys(smileysCountArray.scared).length; 
    if(scaredObjLength>0){
        var scaredObj = smileysCountArray.scared;
        $.each(scaredObj , function(keys, scared_value){
            scaredSum = Number(scaredSum) + Number(scared_value);
        });             
    }
    
    totalSum = Number(happySum)+Number(sadSum)+Number(neutralSum)+Number(angrySum)+Number(disgustedSum)+Number(surprisedSum)+Number(scaredSum);
    var happyPercent = Number(happySum/totalSum);
    var sadPercent = Number(sadSum/totalSum);
    var neutralPercent = Number(neutralSum/totalSum);
    var angryPercent = Number(angrySum/totalSum);
    var disgustedPercent = Number(disgustedSum/totalSum);
    var surprisedPercent = Number(surprisedSum/totalSum);
    var scaredPercent = Number(scaredSum/totalSum);
    
    $('.meaning-happy-blk').circleProgress({
            startAngle: -Math.PI / 4 * 2,
            value: neutralPercent,
            size: 107,
            thickness:20,
            fill: { color: '#231F20' }
    });

    $('.meaning-sad-org').circleProgress({
            startAngle: -Math.PI / 4 * 2,
            value: sadPercent,
            size: 107,
            thickness:20,
            fill: { color: '#F7941D' }
    });
    
    $('.meaning-happy-green').circleProgress({
            startAngle: -Math.PI / 4 * 2,
            value: happyPercent,
            size: 107,
            thickness:20,
            fill: { color: '#84C556' }
    });    
    
    $('.meaning-happy-red').circleProgress({
            startAngle: -Math.PI / 4 * 2,
            value: disgustedPercent,
            size: 107,
            thickness:20,
            fill: { color: '#EE1C25' }
    });

    $('.meaning-sad-purple').circleProgress({
            startAngle: -Math.PI / 4 * 2,
            value: angryPercent,
            size: 107,
            thickness:20,
            fill: { color: '#662D91' }
    });
    
    $('.meaning-happy-blue').circleProgress({
            startAngle: -Math.PI / 4 * 2,
            value: surprisedPercent,
            size: 107,
            thickness:20,
            fill: { color: '#00ADEE' }
    });
    
    $('.meaning-scared-darkgreen').circleProgress({
            startAngle: -Math.PI / 4 * 2,
            value: scaredPercent,
            size: 107,
            thickness:20,
            fill: { color: '#15AB6D' }
    });
    
    $('#neutral-percent').html('<b>Neutral : ' + Number(neutralPercent*100).toFixed(2) +' %</b>');
    $('#sad-percent').html('<b>Sad : ' + Number(sadPercent*100).toFixed(2) +' %</b>');
    $('#happy-percent').html('<b>Happy : ' + Number(happyPercent*100).toFixed(2) +' %</b>');
    $('#disgusted-percent').html('<b>Disgusted : ' + Number(disgustedPercent*100).toFixed(2) +' %</b>');
    $('#angry-percent').html('<b>Angry : ' + Number(angryPercent*100).toFixed(2) +' %</b>');
    $('#surprised-percent').html('<b>Surprised : ' + Number(surprisedPercent*100).toFixed(2) +' %</b>');
    $('#scared-percent').html('<b>Scared : ' + Number(scaredPercent*100).toFixed(2) +' %</b>');
    
 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 //////////////////////////////////emotion analysis///////////////////////////////////////////////////////////
 //////////////////////////////////all videos//////////////////////////////////////////////////
 //////////////////////////////////////////////////////////////////////////////////////
 
 
 var totalSum_overall = 0,
        happySum_overall = 0,
        sadSum_overall = 0,
        neutralSum_overall = 0,
        disgustedSum_overall = 0,
        surprisedSum_overall = 0,
        angrySum_overall = 0,
        scaredSum_overall=0;
        
    var happyObjLength = Object.keys(smileysCountArray_overall.happy).length; 
    if(happyObjLength>0){
        var happyObj = smileysCountArray_overall.happy;
        $.each(happyObj , function(keys, happy_value){
            happySum_overall = Number(happySum_overall) + Number(happy_value);
        });             
    }
    
    var sadObjLength = Object.keys(smileysCountArray_overall.sad).length; 
    if(sadObjLength>0){
        var sadObj = smileysCountArray_overall.sad;
        $.each(sadObj , function(keys, sad_value){
            sadSum_overall = Number(sadSum_overall) + Number(sad_value);
        });             
    }
    
    var neutralObjLength = Object.keys(smileysCountArray_overall.neutral).length; 
    if(neutralObjLength>0){
        var neutralObj = smileysCountArray_overall.neutral;
        $.each(neutralObj , function(keys, neutral_value){
            neutralSum_overall = Number(neutralSum_overall) + Number(neutral_value);
        });             
    }
    
    var angryObjLength = Object.keys(smileysCountArray_overall.angry).length; 
    if(angryObjLength>0){
        var angryObj = smileysCountArray_overall.angry;
        $.each(angryObj , function(keys, angry_value){
            angrySum_overall = Number(angrySum_overall) + Number(angry_value);
        });             
    }
    
    var disgustedObjLength = Object.keys(smileysCountArray_overall.disgusted).length; 
    if(disgustedObjLength>0){
        var disgustedObj = smileysCountArray_overall.disgusted;
        $.each(disgustedObj , function(keys, disgusted_value){
            disgustedSum_overall = Number(disgustedSum_overall) + Number(disgusted_value);
        });             
    }
    
    var surprisedObjLength = Object.keys(smileysCountArray_overall.surprised).length; 
    if(surprisedObjLength>0){
        var surprisedObj = smileysCountArray_overall.surprised;
        $.each(surprisedObj , function(keys, surprised_value){
            surprisedSum_overall = Number(surprisedSum_overall) + Number(surprised_value);
        });             
    }
    
    var scaredObjLength = Object.keys(smileysCountArray_overall.scared).length; 
    if(scaredObjLength>0){
        var scaredObj = smileysCountArray_overall.scared;
        $.each(scaredObj , function(keys, scared_value){
            scaredSum_overall = Number(scaredSum_overall) + Number(scared_value);
        });             
    }
    
    totalSum_overall = Number(happySum_overall)+Number(sadSum_overall)+Number(neutralSum_overall)+Number(angrySum_overall)+Number(disgustedSum_overall)+Number(surprisedSum_overall)+Number(scaredSum_overall);
    var happyPercent_overall = Number(happySum_overall/totalSum_overall);
    var sadPercent_overall = Number(sadSum_overall/totalSum_overall);
    var neutralPercent_overall = Number(neutralSum_overall/totalSum_overall);
    var angryPercent_overall = Number(angrySum_overall/totalSum_overall);
    var disgustedPercent_overall = Number(disgustedSum_overall/totalSum_overall);
    var surprisedPercent_overall = Number(surprisedSum_overall/totalSum_overall);
    var scaredPercent_overall = Number(scaredSum_overall/totalSum_overall);
    
    $('.meaning-happy-blk-overall').circleProgress({
            startAngle: -Math.PI / 4 * 2,
            value: neutralPercent_overall,
            size: 107,
            thickness:20,
            fill: { color: '#231F20' }
    });

    $('.meaning-sad-org-overall').circleProgress({
            startAngle: -Math.PI / 4 * 2,
            value: sadPercent_overall,
            size: 107,
            thickness:20,
            fill: { color: '#F7941D' }
    });
    
    $('.meaning-happy-green-overall').circleProgress({
            startAngle: -Math.PI / 4 * 2,
            value: happyPercent_overall,
            size: 107,
            thickness:20,
            fill: { color: '#84C556' }
    });    
    
    $('.meaning-happy-red-overall').circleProgress({
            startAngle: -Math.PI / 4 * 2,
            value: disgustedPercent_overall,
            size: 107,
            thickness:20,
            fill: { color: '#EE1C25' }
    });

    $('.meaning-sad-purple-overall').circleProgress({
            startAngle: -Math.PI / 4 * 2,
            value: angryPercent_overall,
            size: 107,
            thickness:20,
            fill: { color: '#662D91' }
    });
    
    $('.meaning-happy-blue-overall').circleProgress({
            startAngle: -Math.PI / 4 * 2,
            value: surprisedPercent_overall,
            size: 107,
            thickness:20,
            fill: { color: '#00ADEE' }
    });
    
    $('.meaning-scared-darkgreen-overall').circleProgress({
            startAngle: -Math.PI / 4 * 2,
            value: scaredPercent_overall,
            size: 107,
            thickness:20,
            fill: { color: '#15AB6D' }
    });
    
    $('#neutral-percent-overall').html('<b>Neutral : ' + Number(neutralPercent_overall*100).toFixed(2) +' %</b>');
    $('#sad-percent-overall').html('<b>Sad : ' + Number(sadPercent_overall*100).toFixed(2) +' %</b>');
    $('#happy-percent-overall').html('<b>Happy : ' + Number(happyPercent_overall*100).toFixed(2) +' %</b>');
    $('#disgusted-percent-overall').html('<b>Disgusted : ' + Number(disgustedPercent_overall*100).toFixed(2) +' %</b>');
    $('#angry-percent-overall').html('<b>Angry : ' + Number(angryPercent_overall*100).toFixed(2) +' %</b>');
    $('#surprised-percent-overall').html('<b>Surprised : ' + Number(surprisedPercent_overall*100).toFixed(2) +' %</b>');
    $('#scared-percent-overall').html('<b>Scared : ' + Number(scaredPercent_overall*100).toFixed(2) +' %</b>');
 
 
 
  /////////////////////////////////////////////////////////////////
    
});


