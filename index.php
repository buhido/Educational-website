<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Как сохранить и восстановить здоровье</title>
    <link rel="stylesheet" href="style.css">
    <link rel="chat" href="chat.php">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/react/umd/react.development.js"></script>
    <script src="https://unpkg.com/react-dom/umd/react-dom.development.js"></script>
    <script src="https://unpkg.com/babel-standalone/babel.min.js"></script>
</head>

<body>
    <h1>Health</h1>

    <h2>Чат</h2>

    <input type="text" name="username" id="username" placeholder="Имя">
    <input type="text" name="message" id="message" placeholder="Сообщение">
    <button type="button" onclick="send()">Отправить</button>

    <div id="chat">
    </div>

    <script>
        function send() {
            (async () => {
                const username = document.getElementById('username').value;
                const message = document.getElementById('message').value;
                const fullMessage = `${username}: ${message}`;

                const response = await fetch('chat.php',
                    {
                        method: 'post',
                        headers:
                        {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: `message=${fullMessage}`
                    });
                const answer = await response.text();
                document.getElementById('message').value = "";
            }
            )();
        }

        function get() {
            (async () => {
                const response = await fetch('chat.php');
                const answer = await response.text();
                document.getElementById('chat').innerText = answer;
            }

            )();
        }

        setInterval(get, 2000);
    </script>




<div id="root"></div>
    <script type="text/babel">
      // Вставляем ваше приложение здесь
      class TodoApp extends React.Component {
        constructor(props) {
          super(props);
          this.state = { items: [], text: '' };
          this.handleChange = this.handleChange.bind(this);
          this.handleSubmit = this.handleSubmit.bind(this);
        }

        render() {
          return (
            <div>
              <h3>Список дел</h3>
              <TodoList items={this.state.items} />
              <form onSubmit={this.handleSubmit}>
                <label htmlFor="new-todo">Что нужно сделать?</label>
                <input
                  id="new-todo"
                  onChange={this.handleChange}
                  value={this.state.text}
                />
                <button>Добавить #{this.state.items.length + 1}</button>
              </form>
            </div>
          );
        }

        handleChange(e) {
          this.setState({ text: e.target.value });
        }

        handleSubmit(e) {
          e.preventDefault();
          if (this.state.text.length === 0) {
            return;
          }
          const newItem = {
            text: this.state.text,
            id: Date.now(),
          };
          this.setState((state) => ({
            items: state.items.concat(newItem),
            text: '',
          }));
        }
      }

      class TodoList extends React.Component {
        render() {
          return (
            <ul>
              {this.props.items.map((item) => (
                <li key={item.id}>{item.text}</li>
              ))}
            </ul>
          );
        }
      }

      ReactDOM.render(<TodoApp />, document.getElementById('root'));
    </script>




    <h2><em>Всё о здоровье</em></h2>

    <p>
        Постепенно буду выкладывать различные
        статьи о здоровом образе жизни.<br>Предлагаю
        обсуждать эту тему в чате.
    </p>
    <p>
        <strong>Немного о пользе ходьбы:</strong>
    </p>
    <ul>
        <li>Укрепляет мышцы всего тела и выпрямляет осанку.</li>
        <li>Держит в тонусе суставы, кости и позвоночник.</li>
        <li>Нормализует работу дыхательной системы.</li>
        <li>Улучшает работу сердечно-сосудистой системы, приводит давление в норму.</li>
        <li>Снижает уровень сахара в крови, а значит, противостоит появлению <br>лишнего веса и сахарного диабета.</li>
        <li>Укрепляет <a
                href="https://medaboutme.ru/zdorove/spravochnik/slovar-medicinskih-terminov/immunitet/">иммунитет</a>,
            снижает риск любых заболеваний.</li>
        <li>Снимает стресс, поднимает настроение.</li>
    </ul>


    <!-- ссылка -->
    <p>
        <a href="https://medaboutme.ru/articles/10_plyusov_dlya_zdorovya_esli_vy_khodite_peshkom/"
            target="_blank">Полная статья</a>
    </p>

    <!-- горизонтальная линия -->
    <hr>

    <img src="https://folkextreme.ru/wp-content/uploads/2020/12/yezhednevnyye-progulki-4.jpg" alt="примерно так"
        width="300">
    <p>Ходим</p>

    <img src="img/khodba-1.jpg" alt="" width="300" height="160">

    <p>Ходим и еще раз ходим))</p>

    <hr>
    <footer>
        (c)2023
    </footer>

</body>

</html>