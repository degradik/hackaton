import mysql.connector
from telebot import TeleBot
from telebot.types import Message

# Replace 'YOUR_TOKEN' with your actual Telegram bot token
token = '6785029717:AAFUJtlEmgsJCMnxLsaSAt3b2OUnWwL6Xl0'
bot = TeleBot(token)

# Establish a connection to MySQL database
def create_connection():
    conn = mysql.connector.connect(
        host='127.0.0.1',
        user='root',
        password='',
        database='laravel'
    )
    cursor = conn.cursor()

    # Create the table if it does not exist
    cursor.execute('''
        CREATE TABLE IF NOT EXISTS posts (
            id INT AUTO_INCREMENT PRIMARY KEY,
            chat_id INT,
            age INT,
            occupation TEXT,
            annual_income INT,
            monthly_inhand_salary INT,
            num_bank_accounts INT,
            num_credit_card INT,
            num_of_loan INT,
            num_credit_inquiries INT,
            credit_history_age TEXT,
            amount_invested_monthly INT,
            payment_behaviour TEXT,
            monthly_balance INT
        )
    ''')

    return conn, cursor

# Dictionary to store the current user's question
current_question = {}

# List of questions
questions = [
    "Сколько тебе лет?",
    "Какая у тебя профессия?",
    "Какой годовой доход у тебя?",
    "Какая у тебя заработная плата в месяц на руки?",
    "Сколько у тебя банковских счетов?",
    "Сколько у тебя кредитных карт?",
    "Сколько у тебя займов?",
    "Сколько запросов по кредитной истории ты делал?",
    "Как долго у тебя кредитная история?",
    "Сколько ты инвестируешь ежемесячно?",
    "Каков твой опыт в платежах по кредитам?",
    "Каков ежемесячный баланс?"
]

# Handler for the /start command
@bot.message_handler(commands=['start'])
def start_message(message: Message):
    conn, cursor = create_connection()
    cursor.execute("DELETE FROM posts WHERE chat_id=%s", (message.chat.id,))
    conn.commit()
    conn.close()

    current_question[message.chat.id] = 0
    bot.send_message(message.chat.id, "Привет, хочешь взять кредит? Ответь на несколько вопросов.")
    handle_survey(message)

# Function to handle survey questions
def handle_survey(message: Message):
    chat_id = message.chat.id

    if current_question[chat_id] < len(questions):
        current_question_text = questions[current_question[chat_id]]
        bot.send_message(chat_id, current_question_text)
        current_question[chat_id] += 1  # Increment the question index
    else:
        bot.send_message(chat_id, "Спасибо за ответы! Мы рассмотрим ваш запрос.")

@bot.message_handler(func=lambda message: True, content_types=['text'])
def handle_text(message: Message):
    text = message.text
    # Split the text into separate parts using the '=' character as a delimiter
    parts = text.split('=')

    # Create a dictionary to map the column names to their corresponding values
    values = {
        "age": parts[2],
        "occupation": parts[3],
        "annual_income": parts[4],
        "monthly_inhand_salary": parts[5],
        "num_bank_accounts": parts[6],
        "num_credit_card": parts[7],
        "num_of_loan": parts[8],
        "num_credit_inquiries": parts[9],
        "credit_history_age": parts[10],
        "amount_invested_monthly": parts[11],
        "payment_behaviour": parts[12],
        "monthly_balance": parts[13]
    }

    # Update the records in the 'posts' table using the dictionary 'values'
    for col in ["age", "occupation", "annual_income", "monthly_inhand_salary", "num_bank_accounts", "num_credit_card", "num_of_loan", "num_credit_inquiries", "credit_history_age", "amount_invested_monthly", "payment_behaviour", "monthly_balance"]:
        cursor.execute("UPDATE posts SET "
               "age = IFNULL(age, %s), "
               "occupation = COALESCE(occupation, %s), "
               "annual_income = COALESCE(annual_income, %s), "
               "monthly_inhand_salary = COALESCE(monthly_inhand_salary, %s), "
               "num_bank_accounts = COALESCE(num_bank_accounts, %s), "
               "num_credit_card = COALESCE(num_credit_card, %s), "
               "num_of_loan = COALESCE(num_of_loan, %s), "
               "num_credit_inquiries = COALESCE(num_credit_inquiries, %s), "
               "credit_history_age = COALESCE(credit_history_age, %s), "
               "amount_invested_monthly = COALESCE(amount_invested_monthly, %s), "
               "payment_behaviour = COALESCE(payment_behaviour, %s), "
               "monthly_balance = COALESCE(monthly_balance, %s) ",
               (message.text, message.text, message.text, message.text, message.text,
                message.text, message.text, message.text, message.text, message.text,
                message.text, message.text, message.text))
bot.polling()