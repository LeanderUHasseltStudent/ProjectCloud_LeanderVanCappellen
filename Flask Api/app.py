from flask import Flask, request
from flask_restful import Resource, Api
from flask import jsonify
import mysql.connector
import json
from flask_docs import ApiDoc

app = Flask(__name__)
api = Api(app)

ApiDoc(app)

mydb = mysql.connector.connect(
  host="host.docker.internal",
  user="root",
  port="3306",
  database="Reviews"
)

mycursor = mydb.cursor()

class postReview(Resource):
	def post(self):
		"""
		@@@
		#### args

		Input is given as a json array.

		| args | nullable | type |
		|--------|--------|--------|
		|    Schrijver    |    false    |    string   |
		|    Locatie    |    false    |    string   |
		|    Review    |    false    |    string   |

		#### return
		- ##### no return
        @@@
        """
		sql = "INSERT INTO reviews (Schrijver, Locatie, Review) VALUES (%s, %s, %s)"
		val = (request.json["Schrijver"], request.json["Locatie"], request.json["Review"])
		mycursor.execute(sql, val)
		mydb.commit()

class getReview(Resource):
	def post(self):
		"""
		@@@
		#### args

		Input is given as a json array.

		| args | nullable | type |
		|--------|--------|--------|--------|
		|    Locatie    |    false    |    string   |

		#### return

		Output is given as a json array.

		| args |  type |
		|--------|--------|--------|
		|    Primary_key    |    string   |
		|    Schrijver    |      string   |
		|    Locatie    |    string   |
		|    Review    |    string   |
        @@@
        """
		sql = "SELECT * FROM reviews WHERE Locatie = %s"
		val = (request.json["Locatie"],)
		mycursor.execute(sql, val)
		rows = mycursor.fetchall()
		return jsonify(rows);


api.add_resource(postReview, '/postReview')
api.add_resource(getReview, '/getReview')

if __name__=='__main__':
	app.run(debug=True, host='0.0.0.0')