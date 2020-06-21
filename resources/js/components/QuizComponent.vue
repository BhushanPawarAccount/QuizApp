<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Online Examination
                         <span class="float-right">{{questionIndex}}/{{questions.length}}</span>
                    </div>
                       
                    <div class="card-body">
                        <span class="float-right" style="color:red">{{time}}</span>
                     <div v-for="(question,index) in questions" :key = "index">
                         <div v-show="index===questionIndex">
                            {{question.question}} 
                            <ol>
                            <li v-for="(choice,ind) in question.answers" :key = "ind">
                                <label>
                                        <input type="radio" :value="choice.is_correct==true?true:choice.answer" :name="index" v-model="userResponses[index]" @click="choices(question.id,choice.id)">
                                        {{choice.answer}}
                                </label>
                            </li>
                            </ol>
                         </div>
                        </div>
                        <div v-show="questionIndex!=questions.length">
                            <button v-if="questionIndex>0" class="btn btn-success" @click="prev">prev</button>
                            <span v-if="(questionIndex+1)<questions.length">
                            <button class="btn btn-success float-right" @click="next();postUserChoice()">Next</button></span>
                            <span v-else>
                            <button class="btn btn-success float-right" @click="next();postUserChoice()">Submit</button></span>
                        </div>
                         <div v-show="questionIndex===questions.length">
                                <span class="float-center">Your score : {{score()}}/{{questions.length}} <a href="/home" class="btn btn-success float-right">Back</a></span>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['quizId','quizQuestions','hasQuizPlayed','times',
        'quizz'],
        data(){
            return{
                questions:this.quizQuestions,
                currentquizId:this.quizz.id,
                quiztime:this.quizz.minutes,
                questionIndex:0,
                userResponses:Array(this.quizQuestions.length).fill(false),
                currenctQuestion:0,
                currentAnswer:0,
                //clock:moment(this.quizz.minutes*60*1000)
                clock:moment(''+this.quizz.minutes+':00','mm:ss')
            }
        },
        computed:{
            time:function(){
                var minsec=this.clock.format("mm:ss");
                if(minsec=='00:00'){
                    alert('Timeout!');
                    window.location.reload();
                }
                return minsec;
            }
        },
        mounted() {
            setInterval(()=>{
                this.clock=moment(this.clock.subtract(1,'seconds'))
            },1000);
        },
        methods:{
            next(){
                this.questionIndex++;
            },
            prev(){
                this.questionIndex--;
            },
            choices(question,answer){
                this.currentAnswer=answer,
                this.currenctQuestion=question
            },
            score(){
                return this.userResponses.filter((val)=>{
                    return val===true;
                }).length
            },
            postUserChoice(){
                axios.post('/user/quiz/create',{
                    answerId : this.currentAnswer,
                    questionId:this.currenctQuestion,
                    quizId:this.currentquizId
                }).then((response)=>{
                    console.log('response')
                }).catch((error)=>{
                    alert("Error!")
                })
            }
        }
    }
</script>
