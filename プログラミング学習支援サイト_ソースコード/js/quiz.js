const quiz = [
    {
        question :'Pythonで「Hello, world!」を出力する簡単なコードを書きなさい。<br>文字列は「"」で囲みなさい。',
        correct : 'print("Hello, world!")'
    },
    {
        question: 'Javaで「Hello, world!」を出力することを考えます。以下のプログラムの「？」に入るコードを書きなさい。ただし、文字列は「"」で囲み、「println」を用いること。<br>class HelloWorld {<br>    public static void main(String[] args) {<br>        ?<br>    }<br>}',
        correct: 'System.out.println("Hello, world!");'
    },
    {
        question: 'JavaScriptで「Hello, world!」を出力するためのコードを書きなさい。ただし、文字列は「"」で囲み、「console.log」を用いること。',
        correct: 'console.log("Hello, world!");'
    }
];
quiz.sort(() => 0.5 - Math.random());
  
const quizLength = quiz.length;
let quizIndex = 0;
let score = 0;
  
const answerInput = document.getElementById('answer-input');
const submitButton = document.getElementById('submit-button');
  
  // クイズの問題文を表示
const setupQuiz = () => {
    document.getElementById('js-question').innerHTML = quiz[quizIndex].question;
    answerInput.value = '';
};
  
setupQuiz();
  
const clickHandler = () => {
    quiz[quizIndex].input = answerInput.value;
    if (quiz[quizIndex].correct === answerInput.value) {
        window.alert('正解');
        score++;
    } else {
        window.alert('不正解');
    }
    quizIndex++; // 次の問題へ
    if (quizIndex < quizLength) {
        setupQuiz();
    } else {
        window.alert('終了 正解数は' + score + '/' + quizLength + 'です');
        showAllAnswers();
    }
};
  
  // ボタンクリックで正誤判定
submitButton.addEventListener('click', () => {
    clickHandler();
});
  
const showAllAnswers = () => {
    const container = document.getElementById('all-answers-container');
    container.style.display = 'block';
    
    const tbody = document.getElementById('all-answers-tbody');
    for (const q of quiz) {
        const row = document.createElement('tr');
        row.innerHTML = `<td>${q.question}</td><td>${q.input}</td><td>${q.correct}</td><td>${q.input === q.correct ? '○' : '×'}</td>`;
        tbody.appendChild(row);
    }
};