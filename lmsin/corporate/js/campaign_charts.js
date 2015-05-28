 // emotion animations
smileysCountArray = JSON.parse(smileysCountArray); // parse the json string to json object

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
    
    
    // engagement smileys section
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
    
    
    // Emotions smileys section
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
    
});
