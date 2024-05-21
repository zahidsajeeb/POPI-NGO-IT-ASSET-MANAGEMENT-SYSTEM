<?php date_default_timezone_set('asia/dhaka'); ?>
<?php error_reporting(0); ?>
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice - #123</title>
    <style type="text/css">
        @page {
            margin: 0px;
        }

        body {
            margin: 0px;
        }

        * {
            font-family: Verdana, Arial, sans-serif;
        }

        a {
            color: #fff;
            text-decoration: none;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .invoice table {
            margin: 15px;
        }

        .invoice h3 {
            margin-left: 15px;
        }

        .information {
            background-color: #60A7A6;
            color: #FFF;
        }

        .information .logo {
            margin: 5px;
        }

        .information table {
            padding: 10px;
        }
    </style>
</head>
<body>

<div class="information">
    <table width="100%">
        <tr>
            <td align="left" style="width: 40%;">
                <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAgAAZABkAAD/7AARRHVja3kAAQAEAAAAPAAA/+4ADkFkb2JlAGTAAAAAAf/bAIQABgQEBAUEBgUFBgkGBQYJCwgGBggLDAoKCwoKDBAMDAwMDAwQDA4PEA8ODBMTFBQTExwbGxscHx8fHx8fHx8fHwEHBwcNDA0YEBAYGhURFRofHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8f/8AAEQgAZwDiAwERAAIRAQMRAf/EAMMAAAIDAQEBAQAAAAAAAAAAAAYHAAUIBAMCAQEAAgMBAQEAAAAAAAAAAAAABAUAAwYHAgEQAAEDAgMEAgsJDQgCAwAAAAECAwQRBQASBiExEwdBIlFhcYHhMhSUZhcIkbGCkiNTdBU2odFCYrJzk7PTVHXWGMFScjNjozU3ojTCQxYRAAEDAgIDDAcHBAIDAQAAAAEAAgMRBCESMUEFUXGRobHBIjITYxUGYYHRcpIzFPDhQlLTNNTxYiMWgrKi0lNz/9oADAMBAAIRAxEAPwBnaI0pL1Ja5FwlX65sOJlOshtmQQnKihHjV/vYf3l0IXBoYw4DUsjs2xdcxl7pJB0iMHIh9VnpLd/OPBgTxPu2cCY+B97L8Snqs9Jbv5x4MTxPu2cCngfey/Ep6rPSW7+ceDE8T7tnAp4H3svxKeqz0lu/nHgxPE+7ZwKeB97L8Snqs9Jbv5x4MTxPu2cCngfey/Ep6rPSW7+ceDE8T7tnAp4H3svxKeqz0lu/nHgxPE+7ZwKeB97L8Snqs9Jbv5x4MTxPu2cCngfey/Ep6rPSW7+ceDE8T7tnAp4H3svxKeqz0lu/nHgxPE+7ZwKeB97L8Snqs9Jbv5x4MTxPu2cCngfey/Ep6rPSW7+ceDE8T7tnAp4H3svxKeqz0lu/nHgxPE+7ZwKeB97L8Snqs9Jbv5x4MTxPu2cCngfey/EqmRprScZwtydfyWXBvQ5cmUK9wkYrO2GDS2NGM8pXLhVpuCPRX2LuhcvbfOa4sHV1ylNfOMS0uJ91NRj2Nqg6GR8CHl8uvjNHyTNPpNF0eqz0lu/nHgx98T7tnAq/A+9l+JT1Wekt3848GJ4n3bOBTwPvZfiU9VnpLd/OPBieJ92zgU8D72X4lPVZ6S3fzjwYnifds4FPA+9l+JT1Wekt3848GJ4n3bOBTwPvZfiU9VnpLd/OPBieJ92zgU8D72X4lPVZ6S3fzjwYnifds4FPA+9l+JT1Wekt3848GJ4n3bOBTwPvZfiU9VnpLd/OPBieJ92zgU8D72X4lPVZ6S3fzjwYnifds4FPA+9l+JV2o+X7trsM+4s6iuy3YjC3kIXIOUlCagGgBxdb34fI1pYzE7iGvNkmKJzxLJVoJ6yofre7fvr/ANlOP/mr/wA35zf4342/BXZM3B86mjUgPqJPzH9tXSdO7vov5O/ZiV/EJHvIwv2t80e6E48vfIPvu5kh+YcyWnXN9Sl9xKRNeAAUoADOe3jHTk5zvrv2x42m0iwHUHIh7y6b+8O/HV9/FOYpl2TNwKeXTf3h346vv4mYqdkzcCLuUsuWvmJZUrecUkuOVSVEg/Ir7JwRak9oEm8wxtFlJQDQOUJre0K661ouEppakKNyaBKSQacB/sYOvj0BvrIeT2g3Tq//ADP/AGas9+XTf3h346vv4U5iukdkzcCnl0394d+Or7+JmKnZM3AmtoaRIVya1a4p1ZWlxWVZUSR8m3uODoT/AIXLIbVY0bUgFNXOUqfLpv7w78dX38A5itf2TNwKeXTf3h346vv4mYqdkzcCnl0394d+Or7+JmKnZM3AtI8inHHNAMqcWVq8pf6yiSfGHZw4svlrmHmpoF4aflai7U2o7Zpyzv3W4ryx2RRKE7VuLPioQDvUrw7sESSBgqUmsbKS5lEbNJ4vSVmXWnMvUuqpCxIfVGttTwrcyohsJ6M9KcRXbV3qYSzXDn7y6pszYkFo0ZRmf+Y6fVuITxQnC6rddLjbJSJdvkuRJKPFdZUUK7lRvHax6a4g1CpmgZK3K8BzfSra/wCvNU3yW3LmznEvNsoZ+QUppKgipzFKCE5iVbaYsfO5xqSg7TZNvA0tY0UJrjitOaCvX11o603EqzOux0pfV2XWvk3P/NJw5gfmYCuV7WtewuXs1B2G8cRxK+xalymIopiKLMfOLVUi6a4mNx3lpi24CE0EKIBU2SXTs/1CodwDCW7lzPNNS6r5bsBFaNLh0n9Lh0cVEEeXzv3h346vv4GzFPuyZuDgWtdCX/6/0lbLopWZ55kJkn/Wb6jncqpJOH0L8zAVx3atp9Pcvj1A4bxxHEgnWGsrmwm13B7ObZeHlt2+GxJch0ZSUhD777I4qi5mzZUqCUppvOBpZiKHUfUnmztmxuzsFM8YBcS0Ox1ta04YaKkEk7gX5YtVXNd8ukC3B5UqztF99jy125Q5TaCM6G3pA4rTtFdQ5stQQRiMlOYgavTUFS6sIxEx76ZZDQHII3NOokN6Lm7uFdwoz1jJZlaDukllWZl+A442rspW3mSfcOG9gazMPpCw212FkErTpDXBK3+UMP8A9ZZH+Mjrk79mJX8Qke8jCva3zR7oT3y98g++7mRNfNMWG+RHYtzhNSEOgjOpI4iSRTMhdMyVDsjCh8bXChC1FrfTQODo3EU4PWFk3VFhkWDUE60PnMuI6UJXuzIPWQv4SCDhFIzK4hdhsbttxC2UfiH9eNVeK0WtkWKBY2LbFctMRmPEcaQ5H4SEp6i0gg1ArtB340LGtAwC4ldyyukcJHEurjUqwcbbcTlcSFp/uqAI+7j2hg4jQs0c8mLRH10ti3R243DjNeVoaSEpLyipeYpFBUtqRhNeAB+C6l5WfI60q8l3SNK7mjlqrTkfy/hXyVIvd2ZD9vhKDUZhYqhx+mYlQPjJQkjZ0k492cAccx0BC+adrvgaIozR7sSdYH3rQLcaO0zwWmkIZpThpSAmlKUoNmGtFzhz3E1JxSo5+aYtCdMtXiPEaYnMSUIcfbQlCltuBQKVUAzdbKRXAN9GMtaYrYeUr6TtzE5xLC04HUQkBhUuipyez5pq1TjdbpOityXY6mmYvFSlYQSFKWoBVet4u3DGxjBqSsR5wvZI8kbHFodUmmvc509UIQ2kIQkISNyUig9wYZrAEk4lIH2h9QPSL9CsaFERoTIfdT0F54kCo/FQBT/EcKr99XBu4uieTrQNhdMes409Q+/kS107aTeL9b7Xn4QmyG2C5vyhagCqnaGA425nAbq1N5cdjC+SlcrSeBarsmhNJWaIiNCtceiQAp5xtLjq6dK3FAqPvdjDxkLGigC5DdbVuZ3ZnvdvA0A3gq3VXKnR2oI7gVCbgTSDw5sVCW1hXZWlNEr7eb3RjxLbMfqoUXYbfurdw6Re38rseDcWcNX6Ru2lrwu23FIJpnjyE14brZ3LTX7o6DhRLEWGhXTdnbRju4hIz1jWCnH7O1649huNoWqq4T4faB+bfFCB3Ftk9/DCwfVpG4sT5ytcszJR+JtPWPuPEm5g9Y1TEUVPq+/N2DTNxuyiM0VlRZB3F1XVbT31kYrlflaSjdnWhuJ2R/mOO9r4lkGj8h1aqKddVmcWdpJoCtaj3ACThBpXZ8GjcGheePi9p4ezpqEFu56fdVtSRNjA9g0bdHeOQ984Z2EmlqwXnKzxZMPdPKOdWOsdLXF0WS2SvkrdZX1Kizy06805FJRw2nAyhwtrbSjIc4CTsIO2g9TRHAHQEJs2/YO0kbi+VuLagEOxqRUioJNcMRua1LPZrwxqq9uaaUly2XtK0FQaeYYiFZB4x4iENuLQM+VDZO07aDEYwh5y6HcS+3FzE63jE/Xi9LSXejAkgHCpPGUbavisxNA3OIyCGY9vW02DtOVDeUfcGHFgKTMHpCwm2JC+CVx0lrild/KGH/6yyH8ZHXJ37MSv4hI95GFe1vmj3Qnvl75B993MjrCtPUhfaKsPBu9uvbaKIltGM+ofOMmqSe2pCqfBwrv2UIcuh+TbvNG+I/hNRvH7+VJ/C9bRae5KX3600FEbWrM/bVKhudnKjrN7PzakjvYdWb80Y9C5T5nteyvHEaH9L28aO1rQhClrIShIKlKOwADaScFLPgEmgWOtUXld71Fcbqomkx9biAd4bJo2n4KABjPyPzOJXa7C2EEDI/ytA9evjWoOWth+pNE2qEpOV9TIfkjp4r/yige2nNl72HVuzKwBco23d9vdvfqrQbww+9E2LkqS758/9fPfSWPyjgS9+WtL5T/ej3XLNOEy6kn37OH/AAl4+kt/q8NNn9UrnnnT5sfunlTfwwWLWZOeaFp5izSoUC2Y6knsjhAe+MJr35hXVPKpBsm77uVAkd96O+3IYWpp9lSXGnEmikrSapUCNxBGBQaLQvYHAtIqCm5pv2h7pGaQxfoCZwSADLjkNOkDpUggoUe5lwfHfkdYVWNvfJ0bjWF2T0HEcOnlTBs/Onl/csqVTlQHVbm5jZb91ac7Y+Ngtl5GddFm7nyzexfhzj+014sDxL319pS2a60uUwH2XpbNXbbMbWlaOJTagrRm6qxsPePRj7PEJW4epV7J2hJYXHTBDTg5tMabtN0Kr5X8qZOkJbtxl3EPy5DJYcjMpoyAVJVXMrrKIy7NgxXbWxjNSUXt3b7bxoY1lGg1qdP3caY2DFmVMRRJn2itR8OJbtPNK6z6jMlAHbkRVDQPaUrMfg4XX8mAatv5NsqufMdXRHKebhQ5yF0uzdb7Pny2+JEhxlMUI2FyUC2f9rOD3cVWUeZxJ1Jp5svjFC1jT0nOr6m48tEvb9aXrPep1rerxIT62So7MwQogK+ENuBHtyuI3FpLS4E0TZBocAVa8utQmwaytlwUrLH4oZlE7uC91Fk/4QrN3se7eTK8FB7Zs/qLV7NdKjfGI9i1th8uOKYiiotd/Y29fQ3vyDgqy+cz3ggNqftpPdKVH8oYffrLKfxkdcnfsxK/iEj3kYV7W+aPdCe+XvkH33cyOsK09QZzesH1zoS4IQnNIhATWNlTVmpXTutlQwPdMzMPoTzy7d9heMJ6ruifXo46LLGEa62m57O98Me/XCzLVRucyH2gfnGDtA7qFk97B9g+jiN1Y3zja5oWyjSw09R+8caZ3Nq+fU+g7m6lWV+UjyNjs5n+qqnbDeY97Bt0/LGVlPL1r214wam9I+r76LO3L+wfX2sLXbVJzMLeDkkdHBa+UcB7qU0wpgZmeAul7Xu/p7Z8mumG+cAtc4fLjSmIol3z5/6+e+ksflHAl78taXyn+9HuuWacJl1JPv2cP+EvH0lv9Xhps/qlc886fNj908qb+GCxaUPPvQ8y4x2NSW9ovOwmyzPaQKq4AJUlwAbwglWbtGu4YX3sJPSGpbTyltRsbjA80DjVu/uevV96QeFa6GpiKKYii77PfbzZpQlWqY7DfG9TSiAadCk7lDtEY9seWmoKHubSKduWRocPSnxys5wnUMlNlvgQ1dVA+TSUDKh/KKlJT+Cum3ZsPa6Wdtd5zldpXPdveXPpm9rDjHrGtvtHImng5ZJTEUWSeYuov/0GsblcUKzxuIWYh6OC11EEf4qZu/hDcSZ3krsexrP6a1Yw9alTvnE+xOrk49pux6JjJkXOGzNnLVKkoW+0lac3VQkgqrsbSnZ2ScMrQtazSKlYXzI2e4uzlY8tZ0R0T6+NLnnpHtS9VtXW2ymJTdwYHHLDiHKPM9Q5shNKoyYDvQM9RrWn8qvkFuY5GuaWHCoIwOPLVLfAa061lyz1B9e6Ktk1S88htsR5RO/is9Qk9tQAV38PbeTMwFce25Z/T3T2/hrUbxx4tCKMXpSqLXf2NvX0N78g4KsvnM94IDan7aT3SlR/KGH36yyn8ZHXJ37MSv4hI95GFe1vmj3Qnvl75B993MjrCtPV+LQhaFIWApCgUqSdoIOwg4i+gkGoWPdW2RVj1LcrSQQmI+tDVd5aJzNnvoIOM/KzK4hdq2fddvAyT8zePXxr60bezY9U2y61oiM+kvfmldR0d9CjiRPyuBXnaVr29u+P8zcN/SONM/2jL6FyLVY21ApQhU18A1qV1ba9wBfu4Nv36GrKeTLSjXyn3RynmX17OdgzPXS/uJ2ICYUZRHSqjjvuDJ7uPtgzS5fPOd3gyEe8eQc6eGGSwSmIol3z5/6+e+ksflHAl78taXyn+9HuuWacJl1JPv2cP+EvH0lv9Xhps/qlc886fNj908qb+GCxaCb1zh0La5ghLmKlSOIGnkx0FSG6qyqK1qyoonpoScDPu2NNKp9a+XLuVucNyilRXXvDSuTVfJXSF+WuVFSq1TXOsXYwBaUT0qZPV+KU48y2bHYjAq2w8z3NuMrv8jRqdp4fbVLK88gdaQypVvXHubQ8UIXwXCO2l2ifcWcBvsXjRitVbebrV/XzMPCOL2IHvGmNRWZVLrbpEMVoFutqCCfxV+Ke8cCvjc3SE/tr6Cf5b2u3jzKrx4Ra6LfOkQJ8edGVkkRXUPNK7C21BQ+6MemmhqFXNE2RhY7Q4UPrWzYshEmKzIR4jyEuJ7igCPfxoQahcPkYWuLTqKGeaWovqHRNxlIVklPo8linp4j3VqO2lOZXexTcyZWEprsGz+ou2NPVHSO8PaaBZQwiXX1MRRTEUUxFE5vZ01Bw5dysDiuq8kTIw/HRRDg7pSU+5hjYSYlqw/nKzq1kw1dE8o5+FPTDNYBUWu/sbevob35BwVZfOZ7wQG1P20nulKj+UMPv1llP4yOuTv2YlfxCR7yMK9rfNHuhPfL3yD77uZHWFaeqYiiQPtEWDye+Qb22mjc5osPkD/7WNxJ/GQoD4OFV+yjg7dXRfJ13midEdLDUbx+/lSjwAtku+83mdeJiZc1ed5DLMcH8VhpLQPdOWp7Zx7e8uNSh7a2ZC3K3RUnhNVqTlnYPqPRNshKTlkLaEiT2eI/1yD20ghPew6t2ZWALk227v6i7e7VWg3hh96J8XpSpiKJd8+f+vnvpLH5RwJe/LWl8p/vR7rlmnCZdST79nD/hbx9Jb/V4abP6pXPPOnzY/dPKm/hgsWsr83rL9Va+uaEpysy1CYz2w+My/wDczDCO6ZlkK635due2s2HW3on1aOKibXJXmEzebQ1YZ7oF3t6AhkqIq+wgUSR2VIGxXa29nB9nPmGU6Qsf5m2OYJDMwf43nH+0+w6uBM7Bqyi+XWmnW1NOoS42sFK0KAKSDvBB34hC+tcQajArPHPbSFjsN0t0u1Mpii5JeL8VvY2lTJRRSU/g5uJuGzZhRexNaQRrXSvKm0ZbiN7ZDmyUodeNfYlelKlKCUglRNABtJJwEtWTRbRtsdca3RY69q2WW21HtoSAfexo2igouHTPDnucNZKRftD6j8ovEKwMrq3BR5RJSN3FeHUB7aW9vwsLL+SpDdxb/wAnWWWJ0x0vNBvDTx8i8vZ50+JWoJl7dTVu3NcJgn55+oJHcbSoHu4+WDKuLtxevOF5khbENLzU7zfvpwLQOGq5yvGbDYmwpEOQnMxJbWy8nsocSUqHuHHwioovcUhY4Obpaaj1LG94tj9qu0y2v/50N5xhZ7JbUU1HdpXGee3KSNxdttpxLG2QaHAHhXfoq/qsGqrbdcxS3HeT5RTpZX1HR8RRx7hflcCh9p2n1Fu+PWRhv6RxrXyVJUkKSQpKhVKhtBB6Rh+uMEUVHrv7G3r6G9+QcFWXzme8Ev2p+2k90pUfyhh9+ssp/GR1yd+zEr+ISPeRhXtb5o90J75e+QffdzI6wrT1TEUQVzisAvGg5+VOZ+ABOZ7XBrxP9oqwNdszRn0Yp75cu+xvG7j+ifXo46LLWEi60r/Qdg+vtXWy2FOZl14Lkimzgt/KOV7qUkYtgZmeAl21rv6e2fJrAw3zgONa7w/XGVMRRcV7vESzWmVdJmbyaIguO5BmVQdgVGPL3hoqVfa2zp5Gxt6zjRILmvzZt+q7axabVGeaitvB95+RlSpRQlSUpShJXs69ak4VXN0HigXRNgeX32jzJIQXEUACV+AlrEfcqOZMbRsma3OjOSIM4NlZZy8RC2s1CEqKQoEL27cFW1wIya6Cs7t/Yrr1rSwgPZXToNf6LQultUWzU1oRdbaHBGWtTYDqQlYUg0OwFXv4bRyB4qFze/sZLWTs30zehKv2jrLVFovaE7iuE+vu/KND9ZgG/Zoctd5MucZIj6HDkPMkrFlSYkluTFdWxIZUFtPNkpUlQ3EEYXAkGoW5kja9pa4VadScOlvaGkMMIj6khKlFAoZsXKlxQ/GaVlQT2wodzDCO/p1gsVf+TmuOaB2X+12jh08RRHK9obRrbBVHizX3vwWyhtAr+MorNO8Di437NwpZH5Ouiek5gG+TzJL631pc9W3k3GakNIQnhxYqDVLTYNaVO8kmpOF00xkNStzsvZkdnFkZjrJ3Sr/k3ol+/wCpmZ7zZ+qrUtLz6yOqt1PWbaHZ6wzK7XdGLbSHO6uoJd5k2mLeAsB/ySCg9A1n2eneTW11zms+mZsy0tRHpV4jhNEkJQwFONpcSVLzZjsWNgT3xg6a7DCRTFZDZXlqW6Y2QuDYnfFgaaPVurOd0uc26XGRcZrhdlynFOvLPSpR6B0AbgOjChzi41K6ZBA2JgYwUa0UCY3KbmnZdJWyVbbnEeWl+QZCJUcIWdqEoyKSpSNgyVBBO/dgu1uWxihCzPmDYMt5I2SNwwbSh3yfTup9WC+Qr7Z412g5/JZaSpriDKqgUUmoqelOGjHhwqFz27tX28pjf1mql1pzJ0/pF5hm5okOPSUKcaRHQlWxJptKlIA24rmuGx6UdszYk14CY8oDTTE/cVmnWd/Z1Bqe4XhlgxmpbgUhkmpASkIqSOlWWpwnmfncSupbNtDb27YicxaNKpcVI5Ovl3zwt8K0RLLfmH1PRgliPMZCVhSAaIDgJSQUigqK1wygvAAGuWE2z5We+V0sJbR2JBwx10300td/Y29fQ3vyDh5ZfOZ7wXNNqftpPdKVH8oYffrLKfxkdcnfsxK/iEj3kYV7W+aPdCe+XvkH33cyOsK09UxFF8utNvNLadSFtuJKFoO0FKhQg4hC+tcQajSFniZ7PusRLfEV6GqKHFBhS3VhRbqcpUMhoab8KDYvrhRdKj832uUZg/NTHDXwo25Scq7tpa7TLneFMLeUyGIgYWpdApWZwnMlNPFSB38E2tsWEkpD5h29HdxtjizUrU1w3udNPByySmIoqXWtnl3nStztcMoEmWyW2i4SlNSQdpAOK5mFzSAj9mXLYLhkjuq01SK/p+1385B/TL/Z4WfQv9C3/wDt9nuP4B7VP6ftd/OQf0y/2eJ9C/0Kf7fZ7j+Ae1T+n7XfzkH9Mv8AZ4n0L/Qp/t9nuP4B7U4+WGl7lpnSrdruJbMlLzrhLKipNFkEbSE4YW0ZY2hWJ27fx3VwZGVy0GlevMrTD+pNHzbbFSFTTkdiBRCRxG1A0qdgzJqnv4lxHnYQNK87Evha3LZHdXEHeKVWleQV0lMXBGoybe9lb+rnWVtvDOSrOVpSdoAA2VG/fgKKxJrmwWtv/NsbCwwdMY5gQRvUQ9e+Sevba8oMQ03KOD1X4q0mo6KtqKV17x7uKX2cg1VTK18z2coxdkduO9uhVDPLTXzywhFilgnpW2UDseMvKMVi3k3CjXbbs2iplbw1RppX2fr7KeQ9qJ5NviihVGZUl19XazCraO7VXcwTFYuPWwSO/wDN8LBSAZ3bpwb7TxJ52ay2yy25m3WxhMaGwKIbT2TvKidqlHpJwzYwNFAsBc3Mk7y+Q5nFKHmLye1ZqHWVwvEBcURJXB4YdcUlfybCGzUBCvwkHpwvuLR73kii2exvMdtbWrIn5sza6BuuJ3fShv8Ap+1385B/TL/Z4q+hf6E0/wBvs9x/APap/T9rv5yD+mX+zxPoX+hT/b7PcfwD2p4aCsc2xaRt1pmlBlRUKS6WyVIqpxShQkDoV2MMoGFrACsFta6ZcXL5GdV27vBB3N7ltqHVtxt8i1KjpbjMrbc461INVKqKUSrA91bukIITvy7tqGzY9smarjqH3oA/p+1385B/TL/Z4F+hf6Fov9vs9x/APap/T9rv5yD+mX+zxPoX+hT/AG+z3H8A9q9Y3ILXLUlpxTkLKhaVGjy60Br83iCxfXUvD/NtoWkUfwD2p267+xt6+hvfkHGhsvnM94Lku1P20nulKj+UMPv1llP4yotP3XWqriuy6cluoceddcRGQttsKUAVKNXCkeKns4Knigy55BoAxQFpPdF5ihccScMByqytl35tXRyc3BmSXnLbsmp4jSS2aqFOsU1PUVurimSK0YAXADNo0omG42hKXBjnHJpxGH2oudnU/M56yv3tu4yDbIzgZekcRsUcOWicp658cbhj0ba1DwwtGY76rbe3xiMoc7IDQmo08utXEVjnZKtguLL8ksKTxG2y42HVIIrVLZ63e3nowO51k12UgVRjGbTczOC6m+K8CrbDeua9+cfatU6RIcjAF9JcabKcxIH+YUf3Ti6eG0iALwBXfQ1rc7QnJEbnHLpxA5V7XydzhsUZMm6SZUeOpQQHQ404kKO4EtldO/jzCyzlNGAE+te7mXaMDc0hcBvg8i4brqrmZaVsouFwkx1SGw8yFKQczatyurXFsVrbSVytBoqJ76+ipnc4VFRo0KwscrnFfIRm2uVIkRgstlzjMI6yQCRRxST09jFMzbOJ2V4AO8URbP2lO3NG5xbvt51wXrU/M+yS/JLpPlRZBTmSlSkEKSelKk5kqHcOLoba1lFWAEKi5vb6B2WRzmlfqdTczlWRd7TcZBtbbvAXI4jexzZ1cnj/AIQ20x8Nta58mUZtOtQXt8Yu1zOyVpWo08q9LjfualttsO5TZ0hqFPCVRHeI0rOFJzp6qSVCqdu0Y+RwWr3FrQMzdOleprq/jY17nODX6MQuudI5xwW5jkqVIbRAbQ7LPGjqyIcqEnqqNa5TuxWxtm6lAOlowKulftJgcXF3QFTi3WutuFzzcjpkNuSFNLQHEESI1Skio2Z67sVl9iDTDgKtEe1SKgup7zfaqm0X3mtd7k9bYE2S5OjJUt+OtbbSkBCghVeLk2hSgKb8ESwWkbQ5wGU/bUhLe6v5nljHOLhpGA9GtWF0HOq1wHp8+RIZiMAF13jx1UBISOqhSlHaegYpi+ie4NaASfQURP4nEwveXBo9Lfah1nmBrx55DLV2kLdcUEISCmpUo0A3dnBhsYAKloS5u1btxAD3VK777qTmhYZiYd1uEiNIWgOpRnbXVBJSDVGYb0npxVBb2soqxoIRF1eX0DssjnA0rpHMrluFzzcjpkNuSFNLQHEESI1Skio2Z67sDF9iDTDgKMEe1SKgup7zfaqu0Xrmxd58i32+ZJcmRQTIYWttpSMqshrxSjaFGlMXyw2kbQ5wFDv8yFt7naEzyxjnFzdIqByr6tl35s3O5yrXBmyHZ8LOJTJdZRkLa8iusspSaK2bDiSRWjGhzgMp0YFfYbjaErzG1zi5ukVGrBebl+5qN22Xclz5AhQZBiSneI11HkkAoyg5jtWNoFMfRBalwblGZwqNOheTdX4Y55c7K12U4jSrNtnnW5aRdESJJjlHFSjiN8UopXMG/G3dFK9rFBNkH5aCvEig3aZj7QF1NOkV4FX6cvPNTUT7jVquEh7ggF5xS0IQgK3VUqm+m7F1xDawir2jFD2dxf3BIjc400r6mXTm1EvbNkfmSUXGRTydriN5Vg1oUr8Smw9OPjIrRzC8AZQvsk+0GSiIudnOjEY+vQvOBfOa0+8vWaJOkuXCOtbchoLRlbLasq8y/EACtla9zHp8NoxgeQMpXmK5v5JDE1zi8adGFPToXpqO682NOrbF1nyGkPV4TqVoWhRG8Zk1oe0duPNvFaTdQBeryfaFuR2jnCu8vC66h5pWlcVFwnyGFTUByL8o0oLSrYDVBUBv3HHuK3tZK5Wg006VXPd38RAe5wzaMQuTUeoeYMJ6RZr3PfStSAmRGUttYKHE1oSjMNoPZx7t7e3cA9gG+qry7vGExSuPpGGveV5/KGBv1kd/GVBoeX5LzCtrtaZphar+eJa/+eCr1ua3cP7eTFAbMky3jD/dThwTc0bDj2q7aiW8kJFyvC2GhTYfky+kU7HyhGEF28vYyn4WV46LW7OjEUkpP45acWbnQ3bbK0xpSzWR4Atz9QLS+hX4TUZxxKwd+/gAYMkmJle8fhj5ae1LYbYNt44j+OfHeaTX/quXUHMu+w+Ypjsv5LTDkIiuRKDKpAIS6o7K5qk0PRsxZBs6N1vUjpkVryKq72zKy8yg/wCNrqU5URRbfJt+qNci0pKZb8JuTDSgAnjuNOEUB2VLu3AbpA+KHPoDqHeqOZMWROjnuOz6xYCN8g86qZj2qlcsb8dYBYeK2xC4wbSsnOilAin4X9uL2CL6pnY6NaEkdcfQyfU6cKVp6EPc3/8A27D/AAtr8pWDNk6H++Uv8wdaP/8AMLssV5udo5QvzLa+Y8kXLKHEhJOVSUVHWBGK54WyXga4VGVXWtw+HZxcw0d2nsXzrC4Pai5Y2e+TSF3KNLXGedoE5goKqaAUqciCcS0jEN05jeqRX7ca+bQlNxYsld12upy+wLl0olU7ldqi3oGZcd5iUhI31JTX3QycWXXRuo3boI+3CqrEZ7CZm4QeT2I91ta482yWy1M7V2u5W+M53HEJQO9R0YVWcpa9zz+Jjj9uBPtpQB8TIx+CRg5udcOoZflLHMOhqhluIyn4LXW/8icW27KGD05uVUXcmYXXoDRxKt13rXUOnptgTbpOSMYDDr0YpSUOEEghRIJ2gU2HF1jZxzNfmGOY4obam0prd0WQ9HICRuq8bhFnmlcn4Io/PsJktUoPlC6htJ27KktjApfW1aHaGyU4ijhHS/eWaXw19dQOZA+qkc3WLHIVqBaxalZUSKriqBqoZRRolfjU3YaWxtC8dn1/+XOkd8NotiPbfL19XmxVHy2tn1jra1MkVQ075QvsUYBcFe6pIGCdoyZIHH0U4UDseHtLpg3DXgxRdzjVHu1qtOoIo+SD0mCte+uRxQR7vCWcL9kVje6M7gP24QnHmEiWNkzdFXN48OQrq11rXUGnptgTb5JRFMFh1+MUpKXCCQQSQTtSKbDjxZWcczX5hjmOKs2ptKa3dFkPRyAkbqI4zUWBzKutwSAGpNmRNcA2eK5kJ74awG4l9s1u4+n24UyY1sd69+p0Wbj+5felLUiBrfVspYol56Mlk9kvpLq/urGPl1LngjG4DxYL7YwdndTuOstp68UJPKaToHU6nhmZTqJZcT2Uh1mo9zB4r9RHT/5cxSlxAtJq6O352or1C7rWDfmtQ2om7adDAz2tlYSopKD10ihzbaKBTU9FKYAtxA6Mxv6Mlesm1266ZKJo/wDJDTqje+x3UO6FM69aR1E1p99Nsuz9xVIQnNtbZcCFIbzhNR4q0hQTgy9yxzMMgzMDaetLdmZ5reUQnJIX13gaYV4V5OXm9ydaaTtl9t6o11tyyHZilpV5QFgDMkIGWnU6Cdtd2PQhY2GR0bqtdq3F5NxK65hjlblkZr/N9qL3M93T2n9Z3yHRNylXqRFaepXIA7QHb0jOsjvY8ZBNJFG7qiMHiXvtTbw3Ereu6VzeP7yq633mdqvlnf2Lq55VMtKkSWJCsucJ2qFd3QlYr2Di6SFsFywswD8PtxIeK4fd2MokOZ0dCD9vWiPmFZm7ho61y2qKl2lMV9SR43AeAQr7qQfgnAdhNkmcDodUesJjta3Elsxw60eU+o4fbeQBzh+3k382x+qThtsn5A9fKkHmD927eHIrL+UMU/rIn+MgdqUYl8RLG+PJDo+A5m/swzLczKboSNr8kubcdXjTt5jXNi13DTZbIQmVdW5b5H4QaSlpR+I5jNbPjL2yV1MpzrbbXmET4qfikDj6qDkK5eYFxiWrVukma8OOiW9JkEnYPKHUgrPcKlnHuxjL4ZTrygcAVW1ZmxXEA1ZiT/yP9UN6i5e36VzKUWoji7bNkokqmAHhJbUQp3MsbEqBzADecGW9/G22xPSApTkS272TK69wacjnVrqprRSb04NR68mQXAl63W5tLLoAVR1hlxW41ByubNvYwD2P+OEO/E7lITX6k9tcuacWMFN8A86H9Yy5GruWkHUCXFeU25zJcY6CQ2VbEKXkGyoqlQ7CVHBdo0W9yY9TtCX7QkN3Ytmr0mHpDVuVpwHeK8uZunL9dHrI9boD8tpFtaQtbKFLAVUmhI7Rx62bcRsDw5wHSK8bas5ZTGWNLh2Y0BecGx3iRyml21mG65PbuhDkVKCXElARmqnfsx9fMwXYcSMuTSvMVtI7Z7mBpLxJo16l5angyLFyptNqnILNwlzVSFMK8ZKAF7+3RSKjt49WzxLdue3qhtPtxrzexGCwZG/B7n1pw/cvvke429c7vbHdrcqIFqT+bWE/c4uPm2gQ1rhqP25F98skF72HQ5vIfvRhpC4NXPWer4j3WS3LjONj8aIrh/cU0jC67jLIYiPynj/qnOz5RLcztP5m/wDjhzBC8CZ5bYeY0qtQ8/mT/hK3Mv3MHPZlkgHo9iVxSZ4rp26ecr65h6Vv17nafFthuPtGAw0t9KTw0KKj46twoDXHywuo4mvzGnSK+7XsZZ3xZGkjIBXUiVUrPzOuMeESX4GnlR05dquJxUOJ3dPygwHlpatLtDpK8VEyL63zg3S2CnrqDzpa31XNF+1vIvLc9VuTRb/GbIbASQQVGg3HDmD6UOGTLmWaujfujPah+TXUYK55LNxYsu8X6YvhRLdFCXHSCcocOckAAkkJa6B04H2wS4Njbpcftyozy4GsdJK7BrG8v9FfXhrR905b3aFpZ9T7NsUmYtKw9VCs2ZRq8ArahK92BYTMy5a6UUzYaub1I+4bbS2T225qGdLXz+iqreYelb9e52nxbYbj7RgMNLfSk8NCio+OrcKA1xbYXUcTX5jTpFD7XsZZ3xZGkjIBXUiC6SWXNYaijNGvkOnFR19mtS5t+C4MCxNIhYT+KWvMmE7wbmVo/DBTn51dG4NLY0zKRtdvUhh549JAhLX9zKnA3ZkGQfkB/wCyM7UEQuGmRwP/AIFBBZZe0LqVl9zhMO6kUh13+6hTrAUrvDDOpE8ZGnsuYpJlDrWUE0Bn52q00/btcaa1jHsMZUifpdQSQ++jM2hHDqqjm5spXWia7extxRPJBNCZDRsvo+2KKtIbq2uRE3M6DdOgYburHUqV3TdyZVftR6TlSBc4l0fjKhRgCC0F1UAiii5tUOrTBIuGnJHKBlLAan7YIJ1m8dpNbl2dsjhQbldzWiGc9cpUjQUu9Mhi8rkucZumVQBT0p6CQElQ6DgNga0TBhqyiYSue42zpRSTMa/bgVa/b3r9pfWVpgp4lwiXuTJQwN60l2op2yErp2xi5sgilie7qmMDi/ohnRGeCeNvXbK409f9VV2S0ztOcstRzLowqI/dMkZiO8kocIFUAlKqEf5ijt6BXF80rZrlgaahuKGtoH21jK6QZS+gAOn7YlFTV2aZ1vbLPKoqFebCwyts7i4lTxTXupzJ7+ATETA546zJCeRNGzht0yN3VkhA9fS+9LznD9vJv5tj9UnDfZPyB6+VZ7zB+7dvDkVl/KGKf1kT/GQfLsM4ynjxYm1xW+bEHSf9XDBk7aDrfC72JPJauzHFun87P/ZX+q42vp5twvrbMdUdBRAzvxmSodWpGZwFZ2J24FtXW7M3Z1NdOBPMj79l3Jk7UAU6uLRz4rz1pF1vc7gy/qNuPGlIZCGW3H4zFWwpRqEqcFdpO3H2zdAxpEdSK7hPMvO0WXUrwZg1rqbrRhwoqiT+d7FrRCbghxKUZG5a+Ct4JpsOYuZSadJBwC9liXZifVjTkTWOXajY8ob68K8qFbND1xDYvbUFDDyZbK27ysyIzqkIIWFqcVxep4yqlWDpnwOLC6ooejgfYlVvHdMEgZQ5h0+k0006ccNa+7BH1zCsV0j25qM/Z5KSm4LL0V1pHUIJKw5RByns9jHyd0DpGl1Q8aMD7F6tWXTInhgaY3dbFpHDXBFUS6c7W4rLbFvbUwhCUtKCWFAoAASa8TbswC6KyJNXY+v2JrHPtQNADRSn9vtXJaJ3OCP5b5BCac40p12Xl4C8shVOIk0c6pFB1ejHuVlmaZidGGnRwKm3l2i3NkaDVxJ6unXrQ3rCBryfPbkak4bL5SRHbfkRWEhAO3hoLienecG2j4GNpFiPQCeZLdoRXcjw6egOqrmjgxXxpCFrG3XfyjT6Y0ifwlJLbciK+eGSMxKEuk0rTbj7dvheyklQ3ecOZfNnx3McmaHKX0/M04cK7NMtcwYN+nyrO0w/dHg4JrSXozyk5nApZUgOVTRYpiq5Nu6MB5IaNGBHMrrJt4yVzowC81zYtOvcrurltUPWkay3eLCRHct8oJF0d8ojLCKVpmXxep078WSvhL2l1cw6uB9iqgjuWxPa3KWO63Sbh664Iuj3PncmG01Hgt8FLaUsuJTHV1QmiSCVkHZhe6OxzVJ5U3ZNtQNADRSn9vtQ5p6PzEt+pJsq3NtSb44hxM1tT0Z50BTiVLK2w5mT1wnowZcOt3xgOwZqwIHIltoy8jmc5gBlNc2LSdIrhXdV1fp3OCXZ5ca6Qmmbe6jLJcVwGwlFd5WXKJwNAyza8FpObVp9iNupdovjc2RoDCMeqOdDdria0Z0zcoEBEZdofUFXCQh+KvLSlAp0OUSOr04NldCZWudXONGB5KJbBHciB7GZezPWOZvLXBTTMTWcCNdBZ240iM+wW7llfivIS1RW1dHaJ2ZtpxLl0Li3PUEHDAjHgUso7mNr+zDSCOl0mnDhwRbHufO5MNpqPBb4KW0pZcSmOrqhNEkErIOzC90djmqTypuybagaAGilP7faha2w9fRJ94Uwhp6fJYdbu3EfjOOIbUflFODiVRTsndg6R9u5ra1DQRlwPsSqGO7Y99KF5Bz9JpNNdccF3x/WahuwBqOypuDm+pjxI5DuZunV+U+VojdToxU76Yl9Sel1tOHFgiGfXARUA6PUxbjhv44LifY10qwXSI61HFqkzlP3B7jRglEoqQVILnEog1SnqnFrXQdo0gnMG0GB0cCoc27ML2kN7Mvq7FvWw11w3kTxbhzvataITcELCW8jctXBU9lpQHNxMpNOkpwC6OxLs1fVjTkTRku1BHlDdWnCvKqDRbPMm1Py3bCy3MCyEzGg8w+jPtoV5XapXv6cF3htngCQ03MCOZL9nNvYi4xAO3cWnn0r3vHrQkalt1xnx2mrm0T9WRVOR0JJHjcNpTmZe/bvx5i+lETmtPR1nHlorLj6507XvADx1RVvEK4rmsTHMeNqafcbU027dFuOKuUVt6O4My3CVpdaS5VNF9wjHud1s6INf1dRoeI0VVq29bO58YBfU5hVp16xXdXprhHMq6ssK1Cw1Dhtqoy2p2PHaLhB21W51lZa9P8AbjzZG2jJ7MkneJPIvW0xeygdsA1o0YtAr6yuS6xteSb5apMtthq6xmmEWxsPxkLWhtZUyUoLlV1UTtG/FkToAxwFcprXA+vUqp2XbpWOcAJAG5cW6jhhXFceqrfqufenpN8EWPcVpQHWlyYrKgAkBPUU6COriy1kiYwBlS3eceZU30VxJKXS5Q/3mjiqin6sk/32Pspwf/YY8bs+P4v4/i9vAPaD0/O3D7OLSmnYu9H7anWb7dHp0L//2Q==" alt="Logo" width="64" class="logo" style="text-align:center; width:180px; height:50px;"/>
            </td>
            <td>
                <h2> Visa Automation System </h2><br>
            </td>
        </tr>
    </table>
</div>
<br/>
<div class="invoice">
    <table border="1" style="table-layout: fixed; width:95%;">
        <tr>
            <td colspan="10" style="background:#083078d4; font-size:18px; padding:15px; font-weight:bold; color:wheat; text-align:center;">Student Information</td>
        </tr>
        <tr>
            <td rowspan="5" style="width:40%; text-align:center;"><img src="{{ public_path("upload/".$data->student_img) }}" height="150" width="150"></td>
            <td style="width:20%;background:#f7f7f7; font-weight:bold; font-size:10px; text-align:center;">Student Name</td>
            <td style="width:40%;text-align:center; font-size:10px; word-break:break-all; word-wrap:break-word;">{{$data->student_name}}</td>
        </tr>
        <tr>
            <td style="background:#f7f7f7; font-weight:bold; font-size:10px; text-align:center;">Counselor Name</td>
            <td style="text-align:center; font-size:10px; word-break:break-all; word-wrap:break-word;">
                @php
                    $counselor_name=DB::table('tbl_counselor')->select('counselor_name')->where('counter_no', '=', $data->counselor_name)->first();
                @endphp
                {{($counselor_name->counselor_name)}}
            </td>
        </tr>
        <tr>
            <td style="background:#f7f7f7; font-weight:bold; font-size:10px; text-align:center;">Token</td>
            <td style="text-align:center; font-size:10px; word-break:break-all; word-wrap:break-word;">{{$data->student_id}}</td>
        </tr>
        <tr>
            <td style="background:#f7f7f7; font-weight:bold; font-size:10px; text-align:center;">Email</td>
            <td style="text-align:center; font-size:10px; word-break:break-all; word-wrap:break-word;">{{$data->student_email}}</td>
        </tr>
        <tr>
            <td style="background:#f7f7f7; font-weight:bold; font-size:10px; text-align:center;">Create Date/Time</td>
            <td style="width:20%;text-align:center; font-size:10px; word-break:break-all; word-wrap:break-word;">{{$data->created_at}}</td>
        </tr>
    </table>

    <table border="1" style="table-layout: fixed; width:95%;">
        <tr>
            <td colspan="10" style="background:#083078d4; font-size:18px; padding:15px; font-weight:bold; color:wheat; text-align:center;">Counseling History</td>
        </tr>
        <tr>
            <td style="background:#f7f7f7; font-weight:bold; font-size:10px; text-align:center; width:10%;">Sl no</td>
            <td style="background:#f7f7f7; font-weight:bold; font-size:10px; text-align:center; width:10%;">Counseling Date</td>
            <td style="background:#f7f7f7; font-weight:bold; font-size:10px; text-align:center; width:10%;">Counseling Purpose</td>
            <td style="background:#f7f7f7; font-weight:bold; font-size:10px; text-align:center; width:10%;">Counselor Name</td>
            <td style="background:#f7f7f7; font-weight:bold; font-size:10px; text-align:center; width:20%;">Note</td>
            <td style="background:#f7f7f7; font-weight:bold; font-size:10px; text-align:center; width:20%;">Commitment</td>
            <td style="background:#f7f7f7; font-weight:bold; font-size:10px; text-align:center; width:10%;">Next Appointment Date</td>
            <td style="background:#f7f7f7; font-weight:bold; font-size:10px; text-align:center; width:10%;">Status</td>

        </tr>
        @php
            $history = DB::table('student_entry')->select('*')->where('student_id', '=', $data->student_id)->get();
        @endphp

        @foreach($history as $key=>$result)
            <tr>
                <td style="text-align:center; font-size:10px; word-break:break-all; word-wrap:break-word;">{{++$key}}</td>
                <td style="text-align:center; font-size:10px; word-break:break-all; word-wrap:break-word;">{{$result->date}}</td>
                <td style="text-align:center; font-size:10px; word-break:break-all; word-wrap:break-word;">{{$result->purpose}}</td>
                <td style="text-align:center; font-size:10px; word-break:break-all; word-wrap:break-word;">
                    @php
                        $counselor_name=DB::table('tbl_counselor')->select('counselor_name')->where('counter_no', '=', $result->counselor_name)->first();
                    @endphp
                    {{($counselor_name->counselor_name)}}
                </td>
                <td style="text-align:center; font-size:10px; word-break:break-all; word-wrap:break-word;">{{$result->note}}</td>
                <td style="text-align:center; font-size:10px; word-break:break-all; word-wrap:break-word;">{{$result->commitment}}</td>
                <td style="text-align:center; font-size:10px; word-break:break-all; word-wrap:break-word;">{{$result->next_app_date}}</td>
                <td style="text-align:center; font-size:10px; word-break:break-all; word-wrap:break-word;">
                    @if($result->active=='1')
                        Active
                    @else
                        Inactive
                    @endif
                </td>
            </tr>
        @endforeach
    </table>

</div>
<div class="information" style="position:absolute; width:100%; bottom: 0;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 50%;">
                &copy; Visa BD - All rights reserved.
            </td>
            <td align="right" style="width: 50%;">
                Printing Time: <?php echo date("Y-m-d H:i:s A"); ?>
            </td>
        </tr>

    </table>
</div>

</body>
</html>





