# A script to convert the markers data (from the ismesk project) to GeoJSON
import geojson

import pymysql.cursors
from geojson import Feature, Point, FeatureCollection

# Edit the below to match your MySQL server settings
connection = pymysql.connect(user="ismesk",
                     password="ismesk",
                     db="ismesk",
                     charset='utf8',
                     cursorclass=pymysql.cursors.DictCursor)


# Different colours for different markers
MARKER_COLOR_MAP = dict(
    a='#004358',    # blue
    b='#BEDB39',    # green
    e='#FFE11A',    # yellow
    f='#FD7400',    # orange
)

markers = []

try:
    with connection.cursor() as cursor:
        # Read a single record
        sql = "SELECT * FROM markers"
        cursor.execute(sql)

        for row in cursor.fetchall():
            properties = row
            properties.update({
                'marker-size': "small",
                'marker-color': MARKER_COLOR_MAP[row['type']],
            })
            marker = Feature(
                geometry=Point((row['lng'], row['lat'])),
                properties=properties
            )

            markers.append(marker)


    collection = FeatureCollection(markers)
    print(geojson.dumps(collection, sort_keys=True))

finally:
    connection.close()

